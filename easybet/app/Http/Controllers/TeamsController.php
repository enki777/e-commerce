<?php

namespace App\Http\Controllers;

use App\{Teams,Structures};
use Illuminate\Http\Request;
use App\Http\Requests\Teams as TeamsRequest;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index','show');
        $this->middleware('auth')->only('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Teams::withTrashed()->latest('updated_at')->paginate(5);
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $structures = Structures::all();
        return view('teams.create',compact('structures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamsRequest $teamsRequest)
    {
        // return $teamsRequest;
        Teams::create($teamsRequest->all());
        return redirect()->route('teams.index')->with('status', 'La team a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teams $team)
    {
        // return $team->players;
        $structures = $team->structures->name;
        $players = $team->players;
        return view('teams.show', compact('team','structures','players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teams $team)
    {
        $structures = Structures::all();
        return view('teams.edit', compact('team','structures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamsRequest $teamsRequest, Teams $team)
    {
        $team->update($teamsRequest->all());
        return redirect()->route('teams.index')->with('status', 'La team a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teams $team)
    {
        $team->delete();
        return back()->with('status', 'La team a bien été ajouté a la corbeille');
    }

    public function forceDestroy($id)
    {
        Teams::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('status', 'La team a bien été supprimée définitivement de la base de données.');
    }
    public function restore($id)
    {
        Teams::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('status', 'La team a bien été restaurée.');
    }
}
