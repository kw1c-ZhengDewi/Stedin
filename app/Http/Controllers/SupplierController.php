<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('suppliers', 'name'),
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('suppliers', 'email'),
            ],

              'supplier_description' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('suppliers', 'supplier_description'),
            ],

            // Regex: behalve cijfers en geen letters of andere karakters toegestaan.
        'phone_country_code' => ['nullable', 'string', 'max:5', 'regex:/^\+?[0-9]+$/'],
        'phone_number' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
        ]);

        Supplier::create($validated);

        return redirect()->route('leveranciers.display'); // Redirect to supplier list page
    }

    public function index()
    {
        return Inertia::render('Management/Leveranciers/leveranciers', [
            'title' => 'Nieuw Leverancier toevoegen',
        ]);
    }

    // Show supplier list page
    public function display()
    {
        $leveranciers = Supplier::all();

        return Inertia::render('Leveranciers', [
            'leveranciers' => $leveranciers,
        ]);
    }


    public function edit(Supplier $supplier)
    {
        return Inertia::render('Management/Leveranciers/bewerk_leverancier', [
            'supplier' => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('suppliers', 'name')->ignore($supplier->id),
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('suppliers', 'email')->ignore($supplier->id),
            ],

            'supplier_description' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('suppliers', 'supplier_description')->ignore($supplier->id),
            ],

            'phone_country_code' => ['nullable', 'string', 'max:5', 'regex:/^\+?[0-9]+$/'],
            'phone_number' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
        ]);

        $supplier->update($validated);

        return redirect()->route('leveranciers.display')->with('success', 'Leverancier succesvol bijgewerkt!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('success', 'Supplier deleted successfully');
    }
}
