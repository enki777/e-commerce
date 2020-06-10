<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Structures;
use App\Http\Requests\Structures as StructuresRequest;

class StructuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structures::withTrashed()->latest('updated_at')->get();
        return view('structures.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('structures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StructuresRequest $Structuresrequest)
    {
        Structures::create($Structuresrequest->all());
        return redirect()->route('structures.index')->with('status', "The structure $Structuresrequest->name has been added successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Structures $structure)
    {
        $teams = $structure->teams;
        return view('structures/show',compact('teams','structure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Structures $structure)
    {
        return view('structures.edit',compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StructuresRequest $structuresRequest, Structures $structure)
    {
        $structure->update($structuresRequest->all());
        return redirect()->route('structures.index')->with('status', "The structure $structure->name has been updated successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structures $structure)
    {
        $structure->delete();
        return back()->with('status', "the structure $structure->name has been moved into the crobe !");
    }

    public function forceDestroy($id)
    {
        Structures::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('status', 'The structure has been deleted permanently !');
    }

    public function restore($id)
    {
        Structures::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('status', 'The structure has been restaured successfully !');
    }
}
