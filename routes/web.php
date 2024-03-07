<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', \App\Http\Controllers\HomeAction::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::post('/posts/{post}/likes', \App\Http\Controllers\LikeAction::class)->name('posts.like');
});

Route::get('/auth/google', static fn () => Socialite::driver('google')->redirect())->name('auth.google');
Route::get('/auth/callback', \App\Http\Controllers\GoogleAuthCallbackAction::class);

require __DIR__.'/auth.php';
