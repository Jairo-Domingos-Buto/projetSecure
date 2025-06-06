<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'welcome']);
Route::get('/loginAdmin', [AdminController::class, 'loginAdmin']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
