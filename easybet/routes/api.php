<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('categories','CategoryController@index');
Route::get('matches/search/{name}', 'MatchesController@customSearch');
Route::get('matches/category/{id}', 'MatchesController@customShowCategories');
Route::get('matches/game/{id}', 'MatchesController@customShowGames');
Route::resource('matches','MatchesController');