<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::view('/categories/{path?}/{id?}', 'app');

//Route::view('/matches/{path?}/{id?}', 'app');

// Route::middleware('admin')->group(function () {
Route::view('/admin/user/{path?}/{id?}', 'app');
Route::view('/admin/match/{path?}/{id?}', 'app');
Route::view('/admin/game/{path?}/{id?}', 'app');
Route::view('/admin/category/{path?}/{id?}', 'app');
// });
Route::view('/matches/{path?}/{id?}', 'app');
Route::view('/{path?}', 'app');

// Auth::routes(['verify' => true]);

// Route::get('/', 'MatchesController@index')->name('home');

// Route::post('/user/email/verify', 'UserController@verifyEmail')->name('user.verify');
// Route::get('/user', 'UserController@profile')->name('user.profile');
// Route::get('/user/edit', 'UserController@edit')->name('user.edit');
// Route::patch('/user/update', 'UserController@update')->name('user.update');
// Route::get('/user/edit/password', 'UserController@editPassword')->name('user.edit-password');
// Route::patch('/user/update/password', 'UserController@updatePassword')->name('user.update-password');
// Route::get('/user/delete', 'UserController@delete')->name('user.delete');
// Route::delete('/user/delete/confirm', 'UserController@deleteConfirm')->name('user.delete-confirm');
// Route::get('/user/funds', 'UserController@wallet')->name('wallet');
// Route::post('/user/funds/confirm', 'UserController@addFunds')->name('add-funds');
// Route::get('/user/bets', 'UserController@getBets')->name('get-bets');

// Route::resource('game', 'GameController');
// // routes pour gerer les softDeletes des games
// // Route::put('/game/restore/{id}', 'GameController@restore')->name('game.restore');
// // Route::delete('/game/delete/{id}', 'GameController@delete')->name('game.delete');

// Route::resource('teams', 'TeamsController');
// // routes pour gerer les softDeletes des teams
// Route::delete('teams/force/{team}', 'TeamsController@forceDestroy')->name('teams.force.destroy');
// Route::put('teams/restore/{team}', 'TeamsController@restore')->name('teams.restore');

// Route::resource('structures', 'StructuresController');
// // routes pour gerer les softDeletes des structures
// Route::delete('structures/force/{structure}', 'StructuresController@forceDestroy')->name('structures.force.destroy');
// Route::put('structures/restore/{structure}', 'StructuresController@restore')->name('structures.restore');

// Route::resource('players', 'PlayersController');
// // routes pour gerer les softDeletes des structures
// Route::delete('players/force/{player}', 'PlayersController@forceDestroy')->name('players.force.destroy');
// Route::put('players/restore/{player}', 'PlayersController@restore')->name('players.restore');

// Route::get('/match/{id}/bet', 'MatchesController@bet')->name('bet');
// Route::post('/match/{id}/bet/confirm', 'MatchesController@betConfirm')->name('bet-confirm');
// Route::get('matches/game/{id}', 'MatchesController@customShowGames')->name('matches.game');
// Route::get('matches/categories/game/{id}', 'MatchesController@customShowCategories')->name('matches.categories.game');
// Route::get('matches/search','MatchesController@customSearch')->name('matches.search');
// Route::resource('matches','MatchesController')->except('index');
// // routes pour gerer les softDeletes des matchs
// Route::delete('matches/force/{match}', 'MatchesController@forceDestroy')->name('matches.force.destroy');
// Route::put('matches/restore/{match}', 'MatchesController@restore')->name('matches.restore');

// Route::resource('matchesteams', 'MatchesTeamsController');

// Route::resource('category', 'CategoryController');

// Route::get('matches/{match}/teams/{team1}/{team2}', 'MatchesController@teamDetails')->name('matches.teams.details');

// // Admin
// Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
// // Game
// Route::get('/admin/game/create', 'AdminController@gameCreate')->name('admin.game-create');
// Route::post('/admin/game/store', 'AdminController@gameStore')->name('admin.game-store');
// Route::get('/admin/game/{id}/show', 'AdminController@gameShow')->name('admin.game-show');
// Route::get('admin/game/{id}/edit', 'AdminController@gameEdit')->name('admin.game-edit');
// Route::post('admin/game/{id}/update', 'AdminController@gameUpdate')->name('admin.game-update');
// Route::delete('admin/game/{id}/delete', 'AdminController@gameDelete')->name('admin.game-delete');
// // Category
// Route::get('/admin/category/create', 'AdminController@categoryCreate')->name('admin.category-create');
// Route::post('/admin/category/store', 'AdminController@categoryStore')->name('admin.category-store');
// Route::get('/admin/category/{id}/show', 'AdminController@categoryShow')->name('admin.category-show');
// Route::get('/admin/category/{id}/edit', 'AdminController@categoryEdit')->name('admin.category-edit');
// Route::post('/admin/category/{id}/update', 'AdminController@categoryUpdate')->name('admin.category-update');
// Route::delete('/admin/category/{id}/delete', 'AdminController@categoryDelete')->name('admin.category-delete');
