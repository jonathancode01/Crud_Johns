<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PlayerController::class, 'index']);
Route::get('/players/{player}', [PlayerController::class, 'show']);
route::delete('/players/{player}', [PlayerController::class,'delete']);
route::post('/players', [PlayerController::class,'store']);
Route::get('/players/{player}', [PlayerController::class, 'edit']);  // Rota para exibir o formulário de edição
Route::put('/players/{player}', [PlayerController::class, 'update']);

// Novas rotas para Estoque

Route::get('/produtos/produto', [ProdutoController::class, 'index']);
Route::get('/movimentacao/movimentacao', [MovimentController::class, 'index']);
