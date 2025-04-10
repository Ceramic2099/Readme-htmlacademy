<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');
Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::get('registration', function () {
    return view('registration');
})->middleware('guest');

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('/', 'login')->name('auth.login')->middleware('guest');
        Route::post('registration', 'register')->name('auth.register')->middleware('guest');;
        Route::get('logout','logout')->name('auth.logout')->middleware('auth');
        Route::post('login', 'login')->name('auth.login')->middleware('guest');
    });

Route::middleware('auth')->group(function () {
    Route::get('/posts/create/{type}', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/feed', [FeedController::class, 'index'])->name('home');
    Route::get('/feed/{type}', [FeedController::class, 'filterByType'])->name('feed.filter');

});

// не готовы
Route::get('messages', function () {
    return view('messages');
})->name('messages.create')->middleware('auth');
Route::get('no-results', function () {
    return view('no-results');
})->middleware('auth');
Route::get('popular', function () {
    return view('popular');
})->middleware('auth');
Route::get('profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');;
Route::get('search-results', function () {
    return view('search-results');
})->middleware('auth');
