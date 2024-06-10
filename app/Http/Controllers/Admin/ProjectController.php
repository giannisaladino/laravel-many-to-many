<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $types = Type::all();
        $tecnologies = Tecnology::orderBy('name', 'asc')->get();


        return view("admin.projects.create", compact('types', 'projects', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;

        $n = 0;

        do {
            // SELECT * FROM `posts` WHERE `slug` = ?
            $find = Project::where('slug', $slug)->first(); // null | Post

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        // dd($form_data);

        // creare l'istanza e salvarla nel db
        $project = Project::create($form_data);

        // controlliamo se sono stati inviati dei tags
        if ($request->has('tecnologies')) {
            // $post->tags()->attach($form_data['tags']);
            $project->tecnologies()->attach($request->tecnologies);
        }
        
        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $types = Type::all();
        return view("admin.projects.show", compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}
