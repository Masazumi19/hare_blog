<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;



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

Route::get('/', [Postcontroller::class, 'index'])
    ->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts', PostController::class)
    ->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

Route::resource('posts', PostController::class)
    ->only(['index', 'show']);


Route::resource('posts.comments', CommentController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])//onlyは絞り込みのメソッド
    ->middleware('auth');

require __DIR__ . '/auth.php';
