<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show dashboard for admin
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $games = Game::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.dashboard', compact('games', 'categories'));
    }

    public function gameCreate()
    {
        $categories = Category::all();
        return view('admin.game.create', compact('categories'));
    }

    public function gameStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:35', 'unique:games'],
            'image' => ['nullable', 'image'],
            'categories.*' => ['nullable', 'integer'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
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

        return redirect()
            ->route('admin.dashboard')
            ->with('game-created', 'Game created !');
    }

    public function gameShow($id)
    {
        $game = Game::find($id);
        return view('admin.game.show', compact('game'));
    }

    public function gameEdit($id)
    {
        $game = Game::find($id);
        $categories = Category::all();
        return view('admin.game.edit', compact('game', 'categories'));
    }

    public function gameUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:35', 'unique:games,id,' . $id],
            'image' => ['nullable', 'image'],
            'categories.*' => ['nullable', 'integer'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $file = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image')->store('images', 'public');
        }

        $game = Game::find($id);
        $categories = $request->categories;
        $game->categories()->sync($categories);
        $game->image = $file;
        $game->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('game-updated', 'Game updated !');
    }

    public function gameDelete($id)
    {
        Game::find($id)->delete();
        return redirect()
            ->route('admin.dashboard')
            ->with('game-deleted', 'Game deleted !');
    }
}
