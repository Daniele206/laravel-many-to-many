<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Functions\Helper;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],
        [
            'name.required'=> 'Il campo name é obbligatorio',
            'name.min'=> 'Il campo name deve contener piú di :min caratteri',
            'name.max'=> 'Il campo name non puó contenere piú di :max caratteri',
        ]);

        $exist = Technology::where('name', $request->name)->first();

        if($exist){
            return redirect()->route('admin.technologies.index')->with('error', 'Technology gia presente');
        }else{
            $new = new Technology();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Technology::class);
            $new->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Technology inserita correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20'
        ],
        [
            'name.required'=> 'il campo name é obbligatorio',
            'name.min'=> 'il campo name deve contener piú di :min caratteri',
            'name.max'=> 'il campo name non puó contenere piú di :max caratteri'
        ]);

        $exist = Technology::where('name', $request->name)->first();

        if($exist){
            return redirect()->route('admin.technologies.index')->with('error', 'Technology gia presente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Technology::class);
            $technology->update($val_data);
            return redirect()->route('admin.technologies.index')->with('success', 'Technology modificata correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology eliminata correttamente');
    }
}
