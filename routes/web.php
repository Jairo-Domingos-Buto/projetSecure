<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // Adiciona esta linha

Route::get('/', [AdminController::class, 'welcome']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware('auth');
