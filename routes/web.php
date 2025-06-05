<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/loginAdmin', function () {
    return view('loginAdmin');
});
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->name('dashboard');
