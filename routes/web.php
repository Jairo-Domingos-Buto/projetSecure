<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Adiciona esta linha
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\OcorrenciasController;
use App\Http\Controllers\ReembolsoController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('/ocorrencias', OcorrenciasController::class)->middleware('auth');

// Recibos de Adiantamento
Route::resource('/recibos', ReciboController::class)->middleware('auth');

// Faturas

Route::resource('/faturas', FaturaController::class)->middleware('auth');

// Reembolso

Route::resource('/reembolsos', ReembolsoController::class)->middleware('auth');

// Imprimir faturas

Route::get('/faturas/imprimir/{id}', [App\Http\Controllers\FaturaController::class, 'imprimir'])->name('faturas.imprimir');
Route::get('/reembolsos/imprimir/{id}', [App\Http\Controllers\ReembolsoController::class, 'imprimir'])->name('reembolsos.imprimir');
Route::get('/recibos/imprimir/{id}', [App\Http\Controllers\ReciboController::class, 'imprimir'])->name('recibos.imprimir');







Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
});
