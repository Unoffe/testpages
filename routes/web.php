<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {return view('welcome');})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [PostController::class, 'dashboard'])->name('dashboard');

    Route::middleware('creator')->resource('posts', PostController::class)->except('show');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::prefix('comments')->group(function () {
        Route::post('', [CommentController::class, 'create'])->name('comments.create');
    });
});
