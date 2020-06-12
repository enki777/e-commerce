<?php

namespace App\Http\Controllers;

use App\{Matches, Game, Teams};
use Illuminate\Http\Request;
use App\Http\Requests\Matches as MatchesRequest;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;

// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Validator;


class MatchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show', 'teamDetails', 'bet');
        $this->middleware('auth')->only('index', 'show', 'teamDetails', 'bet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $matches = Matches::withTrashed()->latest('updated_at')->get();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchesRequest $matchesRequest)
    {
        Matches::create($matchesRequest->all());
        return redirect()->route('matches.index')->with('status', "The Match $matchesRequest->name has been created successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Matches $matches
     * @return \Illuminate\Http\Response
     */
    public function show(Matches $match)
    {
        $team1 = $match->team1;
        $team2 = $match->team2;
        $game = $match->games;
        return view('matches.show', compact('match', 'game', 'team1', 'team2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Matches $matches
     * @return \Illuminate\Http\Response
     */
    public function edit(Matches $match)
    {
        $curGame = $match->games;
        $curTeam1 = $match->team1;
        $curTeam2 = $match->team2;
        $games = Game::all();
        $teams1 = Teams::all();
        $teams2 = Teams::all();
        return view('matches.edit', compact('match', 'curGame', 'curTeam1', 'curTeam2', 'games', 'teams1', 'teams2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Matches $matches
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
     * @param \App\Matches $matches
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

    public function teamDetails($match, $team1, $team2)
    {
        $t1 = Teams::find($team1);
        $t2 = Teams::find($team2);

        $t1Players = $t1->players;
        $t2Players = $t2->players;

        return view('matches.teamsDetails', compact('t1Players', 't2Players', 't1', 't2', 'match'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bet($id)
    {
        $match = Matches::find($id);
        $team_1 = $match->team1;
        $team_2 = $match->team2;
        $game = $match->games;

        echo '<pre>';
        print_r($match);
        print_r($team_1);
        print_r($team_2);
        print_r($game);
        echo '</pre>';

        return;
        return view('matches.user.bet');
//        $user = User::find(Auth::id())->bets;
//        $game = Game::find($user[0]->games_id)->categories;
//        $teams_1 = Matches::find($user[0]->games_id)->teams;
//        $teams_2 = Matches::find($user[0]->games_id)->teams2;
//        return [$user, $game, $teams_1, $teams_2];
    }

    public function betConfirm
    {











    }
}
