<?php

namespace App\Http\Controllers;

use App\{Category, Game, User, Matches, Teams};
// use App\Game;
// use App\User;
// use App\Matches;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Teams;
use App\Http\Requests\Matches as MatchesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    public function dashboard()
    {
        $games = Game::latest('updated_at')->get();
        $categories = Category::latest('updated_at')->get();
        $matches = Matches::with('games', 'team1', 'team2')->get();
        $users = User::all();
        $deleted_users = User::onlyTrashed()->get();
        $deletedMatches = Matches::onlyTrashed()->latest('updated_at')->with('games', 'team1', 'team2')->get();
        return [
            'games' => $games,
            'categories' => $categories,
            'matches' => $matches,
            'users' => $users,
            'deleted_users' => $deleted_users,
            'deletedMatches' => $deletedMatches
        ];
    }

    //GAMES
    public function gameCreate()
    {
        $categories = Category::all();
        return $categories->toJson();
    }

    public function gameStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:35', 'string', 'unique:games'],
            'image' => ['nullable', 'image'],
            'categories.*' => ['nullable', 'integer'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }

        $file = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image')->store('images', 'public');
        }

        $game = Game::create([
            'name' => $request->name,
            'image' => $file,
        ]);

        $categories = $request->categories;
        $game->categories()->attach($categories);

        return redirect('/admin/game');
    }

    public function gameShow(Game $game)
    {
        $game->categories;
        return $game->toJson();
    }

    public function gameEdit(Game $game)
    {
        $categories = Category::all();
        return [
            'game' => $game,
            'categories' => $categories,
        ];
    }

    public function gameUpdate(Request $request, Game $game)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:35', 'string', 'unique:games,name,' . $game->id],
            'image' => ['nullable', 'image'],
            'categories.*' => ['nullable', 'integer'],
        ]);

        $file = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image')->store('images', 'public');
        }

        $categories = $request->categories;
        $game->categories()->sync($categories);
        $game->image = $file;
        $game->save();

        return redirect('/admin/game');
    }

    public function gameDelete(Game $game)
    {
        $game->delete();
        return redirect('/admin/game');
    }

    // CATEGORIES
    public function categoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30', 'unique:categories'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Category::create($request->all());

        return redirect('/admin/category');
    }

    public function categoryShow(Category $category)
    {
        $games = $category->games;
        return [
            'category' => $category,
            'games' => $games,
        ];
    }

    public function categoryEdit(Category $category)
    {
        return $category;
    }

    public function categoryUpdate(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30', 'unique:categories,name,' . $category->id],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category->name = $request->name;
        $category->save();

        return redirect('/admin/category');
    }

    public function categoryDelete(Category $category)
    {
        $category->delete();
        return redirect('/admin/category');
    }

    ///////////////////////// MATCHES METHODS /////////////////////////

    public function matchCreate()
    {
        $games = Game::all();
        $team1 = Teams::all();
        $team2 = Teams::all();
        return [$games, $team1, $team2];
    }

    public function matchStore(MatchesRequest $matchesRequest)
    {
        $openning = Carbon::parse($matchesRequest->openning)->format('Y-m-d H:i:s');
        Matches::create([
            "name" => $matchesRequest->name,
            "games_id" => $matchesRequest->games_id,
            "teams_id" => $matchesRequest->teams_id,
            "teams2_id" => $matchesRequest->teams2_id,
            "openning" => $openning
            // $matchesRequest->except($matchesRequest->openning),
            // "openning" => $openning
        ]);
        return redirect('/admin');
    }

    public function matchEdit(Matches $matches)
    {
        // $match = Matches::find($id);
        $matches->games;
        $matches->team1;
        $matches->team2;
        // $openning = Carbon::parse($matches->openning)->format('Y-m-dTH:i:s');

        $games = Game::all();
        $team1 = Teams::all();
        $team2 = Teams::all();
        return [$matches, $games, $team1, $team2];
    }

    public function matchUpdate(MatchesRequest $matchesRequest, Matches $matches)
    {
        $openning = Carbon::parse($matchesRequest->openning)->format('Y-m-d H:i:s');
        $matches->fill($matchesRequest->except('openning'));
        $matches->openning = $openning;
        $matches->save();
        return redirect('/admin');
    }

    public function matchDelete($id)
    {
        $match = Matches::find($id);
        $match->delete();
        return redirect('/admin');
    }

    public function matchForceDestroy($id)
    {
        Matches::onlyTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return redirect('/admin');
    }

    public function matchRestore($id)
    {
        Matches::onlyTrashed()->whereId($id)->firstOrFail()->restore();
        return redirect('/admin');
    }

    public function userShow(User $user)
    {
        return $user;
    }

    public function userSoftDelete(User $user)
    {
        $user->delete();
        return redirect('/admin/user');
    }

    public function userRestore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect('/admin/user');
    }

    public function userForceDelete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect('/admin/user');
    }
}
