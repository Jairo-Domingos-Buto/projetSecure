<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'welcome']);
Route::get('/loginAdmin', [AdminController::class, 'loginAdmin']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
// Para carregar ambas ao mesmo tempo, normalmente você renderiza a view 'dashboard' já incluindo o conteúdo desejado.
// Se quiser acessar ambas em uma única requisição, crie uma rota que chame ambos métodos ou inclua o conteúdo na view do dashboard.
