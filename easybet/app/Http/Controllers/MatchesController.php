<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\{Matches, Game, Teams, User, Category};
use Illuminate\Http\Request;
use App\Http\Requests\Matches as MatchesRequest;
use App\Http\Requests\SearchMatches as SearchMatchesRequest;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;

// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Validator;


class MatchesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin')->except('index', 'show', 'teamDetails', 'bet', 'betConfirm', 'customShowGames', 'customShowCategories','customSearch');
        // $this->middleware('auth')->only('index', 'show', 'teamDetails', 'bet', 'betConfirm', 'customShowGames', 'customShowCategories','customSearch');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $games = Game::all();
        $teams = Teams::all();

        $currentMatches = Matches::select(DB::raw('*,matches.id as "id",DATEDIFF(openning,now()) as days,matches.name as "matchName"'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '<=', now())
            ->where('ending', '>=', now())
            ->orderBy('openning')->get();

        if (!$currentMatches) {
            $currentMatches = "No current matches";
        }

        $upcoming = Matches::select(DB::raw('*,matches.id as "id",DATEDIFF(openning,now()) as days,matches.name as "matchName"'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '>', now())
            ->orderBy('openning')->get();

        // $mostBets = Matches::with('bets')->get();
        // $mostBets->bets;



        $finished = Matches::select(DB::raw('*,matches.id as "id",DATEDIFF(openning,now()) as "days",matches.name as "matchName"'))
            ->with('games', 'team1', 'team2')
            ->whereNotNull('ending')->orderBy('openning')->get();


        return ["currentMatches" => $currentMatches, "finished" => $finished, "categories" => $categories, "games" => $games, "upcoming" => $upcoming, "teams" => $teams];
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
        $match->team1;
        $match->team2;
        $match->games;
        return $match->toJson();
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

    public function storeBet(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => ['required', 'regex:/^[1-9]{1}+[0-9]*(\.[1-9]{1})?$/'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::id());
        if (($user->wallet - $request->amount) >= 0) {
            $team = Teams::find($id);
            $user->bets()->attach($team, ['user_bet' => $request->amount, 'created_at' => now('Europe/Paris'), 'updated_at' => now('Europe/Paris')]);
            $user->wallet -= $request->amount;
            $user->save();
        } else {
            return back()
                ->with('negative', 'Action not possible.')
                ->withInput();
        }

        return redirect()
            ->route('/');
    }

    // FINI
    public function customShowCategories($id)
    {
        $available = Matches::select(DB::raw('matches.*,DATEDIFF(openning,now()) as days,games.name as "gameName"'))
            ->with('team1', 'team2')
            ->join('games', 'matches.games_id', '=', 'games.id')
            ->join('category_game', 'games.id', '=', 'category_game.game_id')
            ->where('category_game.category_id', $id)
            ->where('openning', '>', now())
            ->orderBy('openning')->get();

        $finished = Matches::select(DB::raw('matches.*,DATEDIFF(openning,now()) as days,games.name as "gameName"'))
            ->with('team1', 'team2')
            ->join('games', 'matches.games_id', '=', 'games.id')
            ->join('category_game', 'games.id', '=', 'category_game.game_id')
            ->where('category_game.category_id', $id)
            ->where('openning', '<=', now())
            ->orderBy('openning')->get();

        // $categories = Category::all();
        // $games = Game::all();

        return [
            $available->toJson(),
            $finished->toJson()
        ];
    }

    // FINI
    public function customShowGames($id)
    {
        $categories = Category::all();
        $games = Game::all();
        $available = Matches::select(DB::raw('*,DATEDIFF(openning,now()) as "days", matches.name as "matchesName"'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '>', now())
            ->where('matches.games_id', '=', $id)
            ->orderBy('openning')->get();

        $finished = Matches::select(DB::raw('*,DATEDIFF(now(),openning) as days,matches.name as "matchesName"'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '<=', now())
            ->where('matches.games_id', $id)
            ->orderBy('ending')->get();

        return [
            $available->toJson(),
            $finished->toJson(),
        ];
    }

    public function customSearch(SearchMatchesRequest $searchMatchesRequest)
    {
        $categories = Category::all();
        $games = Game::all();
        $upcoming = Matches::select(DB::raw('*,DATEDIFF(openning,now()) as days'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '>', now())
            ->where('name', 'like', '%' . $searchMatchesRequest['name'] . '%')
            ->orderBy('openning')->get();

        $finished = Matches::select(DB::raw('*,DATEDIFF(openning,now()) as days'))
            ->with('games', 'team1', 'team2')
            ->where('openning', '<', now())
            ->where('name', 'like', '%' . $searchMatchesRequest['name'] . '%')
            ->orderBy('ending')->get();

        return ["upcoming" => $upcoming, $finished->toJson(), $categories->toJson(), $games->toJson()];
    }
}
