<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::All();
        $projects = Project::All();
        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::All();
        $technologies = Technology::All();
        $projects = Project::All();
        return view('admin.projects.create', compact('projects', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        if(array_key_exists('image', $form_data)){
            $image_path = Storage::put('uploads', $form_data['image']);
            $form_data['image'] = $image_path;
        }

        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],
        [
            'name.required'=> 'Il campo name é obbligatorio',
            'name.min'=> 'Il campo name deve contener piú di :min caratteri',
            'name.max'=> 'Il campo name non puó contenere piú di :max caratteri',
        ]);

        $exist = Project::where('name', $request->name)->first();

        if($exist){
            return redirect()->route('admin.projects.index')->with('error', 'Progetto gia presente');
        }else{
            $form_data['slug'] = Helper::generateSlug($form_data['name'] , Project::class);
            $new = new Project();
            $new->fill($form_data);
            $new->save();

            if(array_key_exists('technologies', $form_data)){
                $new->technologies()->attach($form_data['technologies']);
            }

            return redirect()->route('admin.projects.index')->with('success', 'Progetto inserito correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::All();
        $technologies = Technology::All();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $request->all();

        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],
        [
            'name.required'=> 'Il campo name é obbligatorio',
            'name.min'=> 'Il campo name deve contener piú di :min caratteri',
            'name.max'=> 'Il campo name non puó contenere piú di :max caratteri'
        ]);

        $val_data['type_id'] =  (int)$request->type_id;

        $exist = Project::where('name', $request->name)->first();

        $val_data['slug'] = Helper::generateSlug($request->name, Project::class);
        $project->update($val_data);

        if(array_key_exists('technologies', $form_data)){
            $project->technologies()->sync($form_data['technologies']);
        }else{
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project)->with('success', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
