<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
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

Route::post('/add_movie/',[MovieController::class,'create']);
Route::get('/genre',[MovieController::class,'findByGenre']);
Route::get('/timeslot',[MovieController::class,'findByTimeSlot']);
Route::get('/specific_movie_theater',[MovieController::class,'findByTheater']);
Route::get('/search_performer',[MovieController::class,'findByPerformer']);
Route::post('/give_rating',[RatingController::class,'rateMovie']);
Route::get('/new_movies',[MovieController::class,'findByLatest']);
