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

Route::get('/user/{username}', 'UserController@profile')->name('profile');

Route::resource('teams', 'TeamsController');

Route::delete('teams/force/{team}', 'TeamsController@forceDestroy')->name('teams.force.destroy');
Route::put('teams/restore/{team}', 'TeamsController@restore')->name('teams.restore');

