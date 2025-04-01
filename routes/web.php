<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get('adding-post', function () {
    return view('adding-post');
});
Route::get('feed', function () {
    return view('feed');
});
//Route::get('login', function () {
//    return view('login');
//});
//Route::get('login-validation', function () {
//    return view('login-validation');
//});
Route::get('messages', function () {
    return view('messages');
});
Route::get('modal', function () {
    return view('modal');
});
Route::get('no-content', function () {
    return view('no-content');
});
Route::get('no-results', function () {
    return view('no-results');
});
Route::get('popular', function () {
    return view('popular');
});
Route::get('post-detail', function () {
    return view('post-detail');
});
Route::get('profile', function () {
    return view('profile');
});
Route::get('reg-validation', function () {
    return view('reg-validation');
});
Route::get('registration', function () {
    return view('registration');
});
Route::get('search-results', function () {
    return view('search-results');
});
