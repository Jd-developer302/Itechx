<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Frontend\PostsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);


Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('/latest-posts', [PostsController::class, 'latestPosts'])->name('posts.latest');