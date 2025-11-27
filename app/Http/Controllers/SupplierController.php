<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Response;

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

            'supplier_description' => ['nullable', 'string', 'max:100'],
            // Regex: behalve cijfers en geen letters of andere karakters toegestaan.
            'phone_country_code' => ['nullable', 'string', 'max:5', 'regex:/^\+?[0-9]+$/'],
            'phone_number' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
        ]);

        Supplier::create($validated);

        return redirect()->route('leveranciers.index'); // Redirect to supplier list page
    }

    public function create()
    {
        // Bestandnaam veranderen naar toevoegen_leverancier? -> Afspraak maken
        return Inertia::render('Management/Leveranciers/toevoegen_leverancier');
    }

    public function index()
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

            'supplier_description' => ['nullable', 'string', 'max:100'],
            'phone_country_code' => ['nullable', 'string', 'max:5', 'regex:/^\+?[0-9]+$/'],
            'phone_number' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
        ]);

        $supplier->update($validated);

        return redirect()->route('leveranciers.index')->with('success', 'Leverancier succesvol bijgewerkt!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('success', 'Supplier deleted successfully');
    }

    public function search(Request $request): Response
    {

        // Alle waardes worden hier gehaald
        $search = $request->search;

        /* wanneer we een zoekwaarde hebben, kijken we of deze overeenkomt met iets in de titel of
          inhoud */
        $suppliers = Supplier::query()
            ->when($search, fn($query) =>
            $query->where('name', 'LIKE', "%{$search}%"))->get(); // fetch all matching suppliers

        // retourneert de zoekwaarde als een paginaprop naar inertia/vue.
        // Dit is de waarde die we in de data()-eigenschap van het Search Input.vue-component bekijken.
        return Inertia::render('Leveranciers', [
            'suppliers' => $suppliers,
            'search' => $search,
        ]);
    }
}
