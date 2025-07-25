<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => Auth::user()->load('roles')]);
})->middleware('auth');

// The /hrd route is kept for now as it might be used for other purposes,
// but it can be removed if it's confirmed to be unused.
Route::get('/hrd', function () {
    return view('hrd');
});
