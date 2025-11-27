<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
        public function store(Request $request)
    {
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

        return redirect()->route('project.index'); // Go back to project list
    }

        public function create()
    {
        return Inertia::render('Management/Project/toevoegen_project'); // your Vue page
    }

    public function index()
    {
        $projecten = Project::all();

        return Inertia::render('Project', [
            'projecten' => $projecten,
        ]);
    }
}
