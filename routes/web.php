<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/register');
});

Route::name('auth.')->group(function (){
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('index');
});

Route::middleware('check.token.game')->name('game.')->group(function (){
    Route::get('/game_luck/{token}/index', [\App\Http\Controllers\GameLuckController::class, 'index'])->name('index');
});
