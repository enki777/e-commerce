<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Game as GameRequest;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')
            ->except('index', 'show');
        $this->middleware('auth')
            ->only('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $games = Game::latest('updated_at')->paginate(10);
        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('game.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameRequest $request
     * @return RedirectResponse
     */
    public function store(GameRequest $request)
    {
        $file = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image')->store('images', 'public');
        }

        $g = Game::create([
            'name' => $request->name,
            'image' => $file,
        ]);

        $game = Game::find($g->id);
        $game->categories()->attach($request->category);

        return redirect()
            ->route('game.index')
            ->with('store', 'New game created !');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Game $game
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Game $game)
    {
        $categories = $game->categories()->get();
        return view('game.show', compact('game', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Game $game
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('game.edit', compact('game', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Game $game
     * @return RedirectResponse
     */
    public function update(Request $request, Game $game)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:games,name,' . $game->id, 'max:30'],
            'image' => ['nullable', 'image'],
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

        $game->update([
            'name' => $request->name,
            'image' => $file,
        ]);

        $game->categories()->sync($request->category);

        return redirect()
            ->route('game.index')
            ->with('update', 'Game updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Game $game
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()
            ->route('game.index')
            ->with('delete', 'Game deleted !');
    }
}
