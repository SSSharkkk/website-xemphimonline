<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\episodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;









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

Route::get('/trang-chu', [App\Http\Controllers\indexController::class,'home']);
Route::get('/', [App\Http\Controllers\indexController::class,'home']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);


// admin
//category
Route::resource('category', CategoryController::class);
Route::get('/update-status-up', [App\Http\Controllers\CategoryController::class, 'status_up']);

//country
Route::resource('country', CountryController::class);
Route::get('/update-status-country', [App\Http\Controllers\CountryController::class, 'country_up']);


//genre
Route::resource('genre', GenreController::class);
Route::get('/update-status-genre', [App\Http\Controllers\GenreController::class, 'genre_up']);


//time
Route::resource('time', TimeController::class);
Route::get('/update-status-time', [App\Http\Controllers\TimeController::class, 'time_up']);

// movie 
Route::resource('movie', MovieController::class);
Route::get('/update-status-movie', [App\Http\Controllers\MovieController::class, 'movie_up']);
Route::get('/update-status-movie-cate', [App\Http\Controllers\MovieController::class, 'movie_cate_up']);
Route::get('/update-status-movie-genre', [App\Http\Controllers\MovieController::class, 'movie_genre_up']);
Route::get('/update-status-movie-country', [App\Http\Controllers\MovieController::class, 'movie_country_up']);
Route::get('/update-status-movie-year', [App\Http\Controllers\MovieController::class, 'movie_year_up']);
Route::get('/update-status-movie-age', [App\Http\Controllers\MovieController::class, 'movie_age_up']);
Route::get('/update-status-movie-resolution', [App\Http\Controllers\MovieController::class, 'movie_resolution_up']);

// episode 
Route::get('/crate-film/{id}', [App\Http\Controllers\episodeController::class, 'create']);
Route::get('/update-episode/{id}', [App\Http\Controllers\episodeController::class, 'edit']);
Route::get('/delete-episode/{id}', [App\Http\Controllers\episodeController::class, 'destroy']);
Route::post('/update-eps/{id}', [App\Http\Controllers\episodeController::class, 'update']);
Route::post('/episode-crt', [App\Http\Controllers\episodeController::class, 'store']);
Route::get('/episodee/{id}', [App\Http\Controllers\episodeController::class, 'index']);




// admin

// public

//genre

Route::get('/the-loai/{slug}', [App\Http\Controllers\IndexController::class, 'genre']);
Route::get('/quoc-gia/{slug}', [App\Http\Controllers\IndexController::class, 'country']);
Route::get('/phim-moi/{slug}', [App\Http\Controllers\IndexController::class, 'year']);
Route::get('/phim/{slug}', [App\Http\Controllers\IndexController::class, 'category']);
Route::get('/xem-phim/{slug}', [App\Http\Controllers\IndexController::class, 'watch']);
Route::get('/xem-phim/{slug}/{episode}', [App\Http\Controllers\IndexController::class, 'episode']);
Route::post('/tim-kiem', [App\Http\Controllers\IndexController::class, 'search']);
Route::get('/chi-tiet-phim/{slug}', [App\Http\Controllers\IndexController::class, 'details']);
Route::post('/loc-phim', [App\Http\Controllers\IndexController::class, 'orders']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


