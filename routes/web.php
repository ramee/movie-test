<?php

use App\Http\Controllers\Movies\FavouriteMoviesController;
use App\Http\Controllers\Movies\ListMoviesController;
use App\Http\Controllers\Movies\TopMoviesController;
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
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/movies', ListMoviesController::class)->name('movies:list');
    Route::get('/movies/favourite', FavouriteMoviesController::class)->name('movies:favourite');
    Route::get('/movies/top', TopMoviesController::class)->name('movies:top');
});


require __DIR__.'/auth.php';
