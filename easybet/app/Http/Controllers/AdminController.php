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
        $games = Game::latest('updated_at')->get();
        $categories = Category::latest('updated_at')->get();
        return view('admin.dashboard', compact('games', 'categories'));
    }

    //GAMES
    public function gameCreate()
    {
        $categories = Category::all();
        return view('admin.game.create', compact('categories'));
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
            'name' => ['required', 'max:35', 'string', 'unique:games,name,' . $id],
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

    public function categoryCreate()
    {
        return view('admin.category.create');
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

        return redirect()
            ->route('admin.dashboard')
            ->with('category-created', 'Category created !');
    }

    public function categoryShow($id)
    {
        $category = Category::find($id);
        $games = $category->games;
        return view('admin.category.show', compact('category', 'games'));
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30', 'unique:categories,name,' . $id],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('category-updated', 'Category updated !');
    }

    public function categoryDelete($id)
    {
        Category::find($id)->delete();
        return redirect()
            ->route('admin.dashboard')
            ->with('category-deleted', 'Category deleted !');
    }
}
