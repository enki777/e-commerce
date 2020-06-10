<?php

namespace App\Http\Controllers;

use App\{Matches,Game};
use Illuminate\Http\Request;
use App\Http\Requests\Matches as MatchesRequest;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Matches::withTrashed()->latest('updated_at')->get();
        return view('matches.index',compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::all();
        return view('matches.create',compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchesRequest $matchesRequest)
    {
        Matches::create($matchesRequest->all());
        return redirect()->route('matches.index')->with('status',"The Match $matchesRequest->name has been created successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function show(Matches $match)
    {
        $game = $match->games;
        return view('matches.show',compact('match','game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function edit(Matches $match)
    {
        $games = Game::all();
        return view('matches.edit',compact('match','games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function update(MatchesRequest $matchesRequest, Matches $match)
    {
        $match->update($matchesRequest->all());
        return redirect()->route('matches.index')->with('status',"The Match $match->name has been updated successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matches $match)
    {
        $match->delete();
        return back()->with('status',"The Macth $match->name has been moved to the corbe");
    }

    public function forceDestroy($id)
    {
        Matches::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('status', 'The Macth has been deleted permanently !');
    }
    public function restore($id)
    {
        Matches::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('status', 'the Macth has been restored !');
    }
}
