<?php

namespace App\Http\Controllers;

use App\{Matches, Game, Teams};
use Illuminate\Http\Request;
use App\Http\Requests\Matches as MatchesRequest;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
        $this->middleware('auth')->only('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $matches = Matches::withTrashed()->latest('updated_at')->get();
        // return $matches; 
        return view('matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $games = Game::all();
        $team1 = Teams::all();
        $team2 = Teams::all();
        return view('matches.create', compact('games', 'team1', 'team2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchesRequest $matchesRequest)
    {
        // return $matchesRequest;

        //     $match = Matches::find($id->id);
        //     $match->teams()->attach($matchesRequest->teams_id);
        //     $match->teams2()->attach($matchesRequest->teams2_id);

        // $game = Game::find($g->id);
        // $game->categories()->attach($request->category);

        $id = Matches::create([
            'name' => $matchesRequest->name,
            'games_id' => $matchesRequest->games_id
        ]);
        $match = Matches::where('name', '=', $matchesRequest->name)->get();
        $matchId = $match[0]->id;
        DB::table('matches_teams')->insert([
            'matches_id' => $matchId,
            'teams_id' => $matchesRequest->teams_id,
            'teams2_id' => $matchesRequest->teams2_id,
        ]);

        return redirect()->route('matches.index')->with('status', "The Match $matchesRequest->name has been created successfully !");
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
        $team1Id = $match->teams()->get(['teams_id'])[0]->teams_id;
        $team2Id = $match->teams2()->get(['teams2_id'])[0]->teams2_id;
        
        // return $team2Id;
        $team1 = Teams::find($team1Id)->name;
        $team2 = Teams::find($team2Id)->name;

        // return [$team1,$team2];

        return view('matches.show', compact('match', 'game','team1','team2'));
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
        return view('matches.edit', compact('match', 'games'));
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
        return redirect()->route('matches.index')->with('status', "The Match $match->name has been updated successfully !");
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
        return back()->with('status', "The Macth $match->name has been moved to the corbe");
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
