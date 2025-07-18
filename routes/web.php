<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // Adiciona esta linha
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\OcorrenciasController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('/ocorrencias', OcorrenciasController::class)->middleware('auth');

Route::resource('/faturas', FaturaController::class)->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
});
