<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\DistributeurController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\WallController;
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
    return view('welcome');
});

Route::get('/hello', function () {
    return 'hello';
});


/*
Route::get('/dashboard', [WallController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/postMessage', [WallController::class, 'postMessage'])->middleware(['auth'])->name('postMessage');

Route::get('/updateMessage/{id}', [WallController::class, 'updateMessage'])->middleware(['auth'])->name('updateMessage');

Route::post('/updateMessage/{id}', [WallController::class, 'saveMessage'])->middleware(['auth'])->name('saveMessage');

Route::get('/deleteMessage/{id}', [WallController::class, 'deleteMessage'])->middleware(['auth'])->name('deleteMessage');

//controller Cinema

//film
Route::get('/films', [CinemaController::class, 'index'])->middleware(['auth'])->name('films');

Route::get('/film/{id}', [CinemaController::class, 'show'])->middleware(['auth'])->name('showFilm');


//genre
Route::get('/genre/{id}', [GenreController::class, 'show'])->middleware(['auth'])->name('genre');

//distributeur
Route::get('/distributeur/{id}', [DistributeurController::class, 'show'])->middleware(['auth'])->name('distributeur');
*/

require __DIR__ . '/auth.php';

Route::get('/{path?}', function () {
    return view('tp');
});
