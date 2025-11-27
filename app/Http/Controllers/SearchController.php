<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product; // of andere modellen die je wilt doorzoeken

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', '');

        // Zoek bijvoorbeeld in producten
        $results = Product::where('name', 'like', "%{$query}%")->get();

        return Inertia::render('SearchResults', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
