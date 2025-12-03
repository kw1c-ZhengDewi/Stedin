<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'item_nr' => [
                'required',
                'string',
                'max:13',
                Rule::unique('products', 'item_nr'),
            ],

            'item_name' => ['string', 'max:100'],

            // Foreign Key validation
            'supplier_id' => ['required', 'integer', 'exists:suppliers,id'],
        ]);

        Product::create($validated);

        return redirect()->route('product.index');
    }

    public function create() {
        return Inertia::render('Management/Product/toevoegen_product');
    }

    public function index(){

         $producten = Product::all();

         return Inertia::render('Product', [
            'producten' => $producten,
        ]);
    }

}
