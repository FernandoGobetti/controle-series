<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
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

Route::resource('/series', SeriesController::class)->except(['show']);

Route::middleware('autenticador')->group(function () {
    Route::get('/', function () {
        return redirect('/series');
    });

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('singin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

/**
 * Route::controller(SeriesController::class)->group(function () {
 * Route::get('/series', 'index')->name('series.index');
 * Route::get('/series/criar', 'create')->name('series.create');
 * Route::post('/series/salvar', 'store')->name('series.store');
 * });
 *
 * Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');
 */


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');