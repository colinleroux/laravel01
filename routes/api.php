<?php


use App\Http\Controllers\API\AuthorAPIController;
use App\Http\Controllers\API\BookAPIController;
use App\Http\Controllers\API\GenreApiController;
use App\Http\Controllers\API\LanguageApiController;
use App\Http\Controllers\API\PublisherAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('languages', LanguageApiController::class)->middleware('auth:sanctum');
    Route::resource('genres', GenreApiController::class);
    Route::resource('users', UserApiController::class);
    Route::resource('publishers', PublisherAPIController::class);
    Route::resource('authors', AuthorAPIController::class);
    Route::resource('books', BookAPIController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
