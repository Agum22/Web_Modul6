<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PostsController;

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
    return view('index');
});

Route::get('/modul', [ModulController::class, 'index']);
Route::get('/modul/profile', [ModulController::class, 'profile']);
Route::get('/modul/calculator', [ModulController::class, 'calculator']);
Route::get('/modul/category/{category}', [ModulController::class, 'category']);


Route::get('/login', [ModulController::class, 'login']);
Route::post('/login', [ModulController::class, 'cekLogin']);
Route::get('/dashboard', [ModulController::class, 'dashboard']);
Route::get('/users', [ModulController::class, 'users']);
Route::get('/category', [ModulController::class, 'categories']);


Route::get('/posts', [PostsController::class, 'posts']);
Route::get('posts/add', [PostsController::class, 'add']);
Route::post('posts/add', [PostsController::class, 'push']);
Route::get('posts/edit/{id}', [PostsController::class, 'edit']);
Route::post('posts/edit', [PostsController::class, 'update']);
Route::get('posts/delete/{id}', [PostsController::class, 'delete']);

