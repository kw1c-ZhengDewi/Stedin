<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Controller;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone_country_code' => 'nullable|string|max:5',
            'phone_number' => 'nullable|string|max:15',
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone_country_code' => 'nullable|string|max:5',
            'phone_number' => 'nullable|string|max:15',
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
