<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // Adiciona esta linha
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OcorrenciasController;

Route::get('/', [AdminController::class, 'welcome']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::resource('/ocorrencias', OcorrenciasController::class)->middleware('auth');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Route::get('/clientes', [ClienteController::class, 'index'])->middleware('auth');
