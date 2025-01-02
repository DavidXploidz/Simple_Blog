<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;

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


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/login', [AuthController::class, 'login_store']);
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register', [AuthController::class, 'register_store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::post('/post/{post}/comment', [PostController::class, 'comment_store'])->name('comment.store');
});
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
