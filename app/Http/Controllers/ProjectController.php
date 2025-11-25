<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function store(Request $request){

          $validated = $request->validate([
            'project_nr' => [
                'required',
                'string',
                'max:13',
                Rule::unique('projects', 'project_nr'),
            ],

        'project_name' => ['string','max:100'],
        'order_note' => ['string','nullable'],
        'cost_center' => ['string','max:50', 'nullable'],
        'delivery_street' => ['string','max:50'],
        'city' => ['string','max:100'],
        'state_province' => ['string','max:100'],
        'country' => ['string','max:100'],
        'delivery_date' => ['string','max:100'],
        ]);

        Project::create($validated);

        return redirect()->route('project.index'); // Redirect to Project list page
    }

      public function index()
    {
        return Inertia::render('Management/Project/toevoegen_project', [
            'title' => 'Nieuw Project toevoegen',
        ]);
    }
}
