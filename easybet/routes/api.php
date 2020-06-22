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
Route::get('matches/search/{matches}', 'MatchesController@customSearch');
Route::get('matches/category/{id}', 'MatchesController@customShowCategories');
Route::get('matches/game/{id}', 'MatchesController@customShowGames');
Route::get('matches/bet/{id}','MatchesController@storeBet');
Route::resource('matches', 'MatchesController');

// authentication
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');

// ADMIN
Route::get('admin', 'AdminController@dashboard');
// GAME
Route::get('admin/game/create', 'AdminController@gameCreate');
Route::post('admin/game/store', 'AdminController@gameStore');
Route::get('admin/game/{game}', 'AdminController@gameShow');
Route::get('admin/game/edit/{game}', 'AdminController@gameEdit');
Route::patch('admin/game/update/{game}', 'AdminController@gameUpdate');
Route::delete('admin/game/delete/{game}', 'AdminController@gameDelete');
// CATEGORY
Route::post('admin/category/store', 'AdminController@categoryStore');
Route::get('admin/category/{category}', 'AdminController@categoryShow');
Route::get('admin/category/edit/{category}', 'AdminController@categoryEdit');
Route::patch('admin/category/update/{category}', 'AdminController@categoryUpdate');
Route::delete('admin/category/delete/{category}', 'AdminController@categoryDelete');
//MATCH
Route::get('admin/match/create', 'AdminController@matchCreate');
Route::post('admin/match/store', 'AdminController@matchStore');
Route::get('admin/match/edit/{matches}', 'AdminController@matchEdit');
Route::patch('admin/match/update/{matches}', 'AdminController@matchUpdate');
Route::delete('admin/match/delete/{id}', 'AdminController@matchDelete');
Route::delete('admin/match/force/{id}', 'AdminController@matchForceDestroy');
Route::put('admin/match/restore/{id}', 'AdminController@matchRestore');
//USER
Route::get('admin/user/{user}', 'AdminController@userShow');
Route::delete('admin/user/delete/{user}', 'AdminController@userSoftDelete');
Route::patch('admin/user/restore/{user}', 'AdminController@userRestore');
Route::delete('admin/user/remove/{user}', 'AdminController@userForceDelete');
