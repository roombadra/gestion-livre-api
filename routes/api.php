<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\LibraryController;
use App\Http\Controllers\API\CategoryController;

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
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('library', LibraryController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('author', AuthorController::class);
    Route::apiResource('book', BookController::class);
});

Route::post('/login', [AuthController::class, 'login']);
