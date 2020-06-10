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

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('layouts.app');
})->name('home');

Route::post('/user/email/verify', 'UserController@verifyEmail')->name('user.verify');
Route::get('/user', 'UserController@profile')->name('user.profile');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::patch('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/edit/password', 'UserController@editPassword')->name('user.edit-password');
Route::patch('/user/update/password', 'UserController@updatePassword')->name('user.update-password');
Route::get('/user/delete', 'UserController@delete')->name('user.delete');
Route::delete('/user/delete/confirm', 'UserController@deleteConfirm')->name('user.delete-confirm');

Route::resource('game', 'GameController');

Route::resource('teams', 'TeamsController');
// routes pour gerer les softDeletes des teams
Route::delete('teams/force/{team}', 'TeamsController@forceDestroy')->name('teams.force.destroy');
Route::put('teams/restore/{team}', 'TeamsController@restore')->name('teams.restore');

Route::resource('structures', 'StructuresController');
// routes pour gerer les softDeletes des structures
Route::delete('structures/force/{structure}', 'StructuresController@forceDestroy')->name('structures.force.destroy');
Route::put('structures/restore/{structure}', 'StructuresController@restore')->name('structures.restore');

Route::resource('players','PlayersController');
// routes pour gerer les softDeletes des structures
Route::delete('players/force/{player}', 'PlayersController@forceDestroy')->name('players.force.destroy');
Route::put('players/restore/{player}', 'PlayersController@restore')->name('players.restore');
