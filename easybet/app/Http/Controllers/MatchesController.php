<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\{Matches, Game, Teams, User, Category};
use Illuminate\Http\Request;
use App\Http\Requests\Matches as MatchesRequest;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;

// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Validator;


class MatchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show', 'teamDetails', 'bet', 'betConfirm', 'customShowGames', 'customShowCategories');
        $this->middleware('auth')->only('index', 'show', 'teamDetails', 'bet', 'betConfirm', 'customShowGames', 'customShowCategories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $available = Matches::select(DB::raw('*,DATEDIFF(openning,now()) as days'))->where('openning', '>', now())->orderBy('openning')->get();
        $most_popular = [];
        foreach ($available as $value) {
            if ($value->bets != '[]' | null) {
                $count[$value->id] = $value->bets->count();
                $most_popular[$value->id] = Matches::find($value->id);
            }
        }

        $finished = Matches::select(DB::raw('*,DATEDIFF(now(),openning) as days'))->where('openning', '<', now())->orderBy('ending')->get();
        $games = Game::all();
        $categories = Category::all();
        return view('matches.index', compact('games', 'categories', 'available', 'finished', 'most_popular'));
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
        $team1 = $match->team1;
        $team2 = $match->team2;
        $game = $match->games;
        return view('matches.user.bet', compact('match', 'team1', 'team2', 'game'));
    }

    public function betConfirm(Request $request, $id)
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
            $match = Matches::find($id);
            $user->bets()->attach($match, ['user_bet' => $request->amount, 'created_at' => now('Europe/Paris'), 'updated_at' => now('Europe/Paris')]);
            $user->wallet -= $request->amount;
            $user->save();
        } else {
            return back()
                ->with('negative', 'Action not possible.')
                ->withInput();
        }

        return redirect()
            ->route('get-bets');
    }

    public function customShowCategories($id)
    {
        $category = Category::find($id);
        $matches = $category->matches;

        return $matches;
        return view('matches.index', compact('games', 'categories'));
    }

    public function customShowGames($id)
    {
        $categories = Category::all();
        $games = Game::all();
        $available = Matches::select(DB::raw('*,DATEDIFF(openning,now()) as days'))
            ->where('openning', '>', now())
            ->where('games_id', $id)
            ->orderBy('openning')->get();

        $finished = Matches::select(DB::raw('*,DATEDIFF(now(),openning) as days'))
            ->where('openning', '<', now())
            ->where('games_id', $id)
            ->orderBy('ending')->get();

        return view('matches.index', compact('games', 'categories', 'available', 'finished'));
    }

    public function customSearch()
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable',
        //     'description' => 'nullable',
        //     'categories' => 'nullable',
        // ]);

        // $matches = ;

        // $articles = DB::table('articles')
        //     ->join('users', 'users.id', '=', 'articles.user_id')
        //     ->join('categories', 'categories.id', '=', 'articles.categorie_id')
        //     ->select('articles.*', 'users.name', 'categories.nom')
        //     ->whereRaw('concat(title," ",description," ",categories.nom) like "%' . $validatedData['title'] . '%' . $validatedData['description'] . '%' . $validatedData['categories'] . '%" ')
        //     ->orderBy('articles.updated_at', 'desc')
        //     ->paginate(5);
    }
}
