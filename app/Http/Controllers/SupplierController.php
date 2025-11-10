<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

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

         // Return Inertia response (redirect back with success message)
        return redirect()->back()->with('success', 'Nieuw leverancier aangemaakt');
    }

      public function index()
    {
         return Inertia::render('Management/Leveranciers/leveranciers', [
            'title' => 'Nieuw Leverancier toevoegen',
        ]);
    }
}
