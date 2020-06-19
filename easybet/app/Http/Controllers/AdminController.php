<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\User;
use App\Http\Controllers\Controller;
use App\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function dashboard()
    {
        $games = Game::latest('updated_at')->get();
        $categories = Category::latest('updated_at')->get();
        $matches = Matches::with('games', 'team1', 'team2')->get();
//        $users = User::all();
        return [
            'games' => $games,
            'categories' => $categories,
            'matches' => $matches,
//            'users' => $users,
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
        $request->validate([
            'name' => ['required', 'max:35', 'string', 'unique:games'],
            'image' => ['nullable', 'image'],
            'categories.*' => ['nullable', 'integer'],
        ]);

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

        return redirect('/admin')->with('game-created', 'Game created !');
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

        return redirect('/admin');
    }

    public function gameDelete(Game $game)
    {
        $game->delete();
        return redirect('/admin');
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

        return redirect('/admin');
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

        return redirect('/admin');
    }

    public function categoryDelete(Category $category)
    {
        $category->delete();
        return redirect('/admin');
    }

}
