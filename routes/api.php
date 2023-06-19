<?php

use App\Http\Controllers\API\PublisherAPIController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LanguageApiController;
use App\Http\Controllers\API\GenreApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource( name: 'languages', controller: LanguageApiController::class);
Route::resource('genres', GenreApiController::class);
Route::resource('users', UserApiController::class);
Route::resource('publishers', PublisherAPIController::class);
