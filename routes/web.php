<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/dashboard2', function () {
    return view('index2');
})->name('dashboard2');

Route::get('/dashboard3', function () {
    return view('index3');
})->name('dashboard3');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login-v2', function () {
    return view('login-v2');
})->name('login-v2');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/register-v2', function () {
    return view('register-v2');
})->name('register-v2');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/lockscreen', function () {
    return view('lockscreen');
})->name('lockscreen');

Route::get('/starter', function () {
    return view('starter');
})->name('starter');

Route::get('/theme', function () {
    return view('theme');
})->name('theme');

Route::get('/small-box', function () {
    return view('small-box');
})->name('small-box');

Route::get('/info-box', function () {
    return view('info-box');
})->name('info-box');

Route::get('/card', function () {
    return view('cards');
})->name('card');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/layout/unfixed-sidebar', function () {
    return view('layout.unfixed-sidebar');
})->name('unfixed-sidebar');

Route::get('/layout/fixed-sidebar', function () {
    return view('layout.fixed-sidebar');
})->name('fixed-sidebar');

Route::get('/layout/fixed-header', function () {
    return view('layout.fixed-header');
})->name('fixed-header');

Route::get('/layout/fixed-footer', function () {
    return view('layout.fixed-footer');
})->name('fixed-footer');

Route::get('/layout/fixed-complete', function () {
    return view('layout.fixed-complete');
})->name('fixed-complete');

Route::get('/layout/layout-custom-area', function () {
    return view('layout.layout-custom-area');  
})->name('layout-custom-area');

Route::get('/layout/sidebar-mini', function () {
    return view('layout.sidebar-mini');
})->name('sidebar-mini');

Route::get('/layout/collapsed-sidebar', function () {
    return view('layout.collapsed-sidebar');
})->name('collapsed-sidebar');

Route::get('/layout/collapsed-sidebar-without-hover', function () {
    return view('layout.collapsed-sidebar-without-hover');
})->name('collapsed-sidebar-without-hover');

Route::get('/layout/logo-switch', function () {
    return view('layout.logo-switch');
})->name('logo-switch');

Route::get('/layout/top-nav', function () {
    return view('layout.top-nav');
})->name('top-nav');

Route::get('/layout/layout-rtl', function () {
    return view('layout.layout-rtl');
})->name('layout-rtl');