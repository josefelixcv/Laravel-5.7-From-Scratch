<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('auth')->only(['store', 'create']);
        //$this->middleware('auth')->except(['show']);
    }    

    //
    public function index() {
        //$projects = Project::all();
        	/*
            auth()->id(); // id
            auth()->user(); // User
            auth()->check(); // boolean
            if (auth()->guest())
            */
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project) {
        return view('projects.show', compact('project'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store() {

        /*Project::create(
            request()->validate([
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:3']
            ])
        );*/

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();

       // Project::create(request(['title', 'description']));
        
        Project::create($attributes);

        // Project::create(request()->all());


        /*$project = new Project();

        $project->title = request('title');
        $project->description = request('description');
        
        $project->save();*/

        return redirect('/projects');
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project) {
        $project->update(request(['title', 'description']));
        return redirect('/projects');
    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect('/projects');
    }
}
