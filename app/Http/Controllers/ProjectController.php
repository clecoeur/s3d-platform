<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::status('publish')
            ->hasMeta('userAssociated', Auth::user()->ID, '=')
            ->get();

        $currentProject = $projects->shift();

        return view('dashboard', compact('currentProject', 'projects'));
    }

    public function view($id)
    {
        $currentProject = Project::find($id);

        if(!$currentProject) {
            abort(404);
        }

        $projects = Project::status('publish')
            ->hasMeta('userAssociated', Auth::user()->ID, '=')
            ->get();

        foreach ($projects as $key => $project) {
            if ($project->ID === $currentProject->ID) {
                unset($projects[$key]);
            }
        }

        return view('dashboard', compact('currentProject', 'projects'));
    }
}
