<?php

namespace App\Http\Controllers;

use App\{Players,Teams};
use Illuminate\Http\Request;
use App\Http\Requests\Players as PlayersRequest;

class PlayersController extends Controller
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
        $players = Players::withTrashed()->latest('updated_at')->get();
        return view('players.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Teams::all();
        return view('players.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayersRequest $playersrequest)
    {
        Players::create($playersrequest->all());
        return redirect()->route('players.index')->with('status', "The player $playersrequest->pseudo has been created successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function show(Players $player)
    {
        $team = $player->teams;
        return view('players.show',compact('player','team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function edit(Players $player)
    {
        $teams = Teams::all();
        return view('players.edit',compact('player','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function update(PlayersRequest $playerRequest, Players $player)
    {
        $player->update($playerRequest->all());
        return redirect()->route('players.index')->with('status', "The Player $player->pseudo has been updated successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function destroy(Players $player)
    {   
        $player->delete();
        return back()->with('status', "The player $player->pseudo has been added to the corbe !");
    }

    public function forceDestroy($id)
    {
        Players::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('status', 'The player has been deleted permanently !');
    }
    public function restore($id)
    {
        Players::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('status', 'the player has been restored !');
    }
}
