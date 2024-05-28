<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Functions\Helper;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::All();
        return view('admin.types.index', compact('types'));
    }

    public function typeProjects(){
        $types = Type::All();
        return view('admin.types.typeProjects', compact('types'));
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

        $exist = Type::where('name', $request->name)->first();

        if($exist){
            return redirect()->route('admin.types.index')->with('error', 'Type gia presente');
        }else{
            $new = new Type();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Type::class);
            $new->save();
            return redirect()->route('admin.types.index')->with('success', 'Type inserito correttamente');
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
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20'
        ],
        [
            'name.required'=> 'il campo name é obbligatorio',
            'name.min'=> 'il campo name deve contener piú di :min caratteri',
            'name.max'=> 'il campo name non puó contenere piú di :max caratteri'
        ]);

        $exist = Type::where('name', $request->name)->first();

        if($exist){
            return redirect()->route('admin.types.index')->with('error', 'Type gia presente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Type::class);
            $type->update($val_data);
            return redirect()->route('admin.types.index')->with('success', 'Types modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Type eliminato correttamente');
    }
}
