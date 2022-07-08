<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/
Route::prefix('posts')->group(function () {
    Route::post('create', [PostsController::class, 'create']);
    Route::post('show', [PostsController::class, 'tampil']);
    Route::post('show/{id}', [PostsController::class, 'show']);
    Route::post('update/{id}', [PostsController::class, 'update']);
    Route::post('delete/{id}', [PostsController::class, 'destroy']);
});

Route::middleware('jwt.verify')->group(function(){
    Route::apiResource('posts', PostsController::class, [
        'as' => 'api'
    ]);
});

Route::prefix('category')->group(function () {
    Route::post('create', [CategoryController::class, 'create']);
    Route::post('show', [CategoryController::class, 'tampil']);
    Route::post('show/{id}', [CategoryController::class, 'show']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::post('delete/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

});

Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Resource not found'
    ], 404);
})->where('any', '.*');