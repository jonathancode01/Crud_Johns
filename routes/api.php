<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/players', [PlayerController::class,'index']);
route::post('/players', [PlayerController::class,'store']);
route::get('/players/{player}', [PlayerController::class,'show']);
route::put('/players/{player}', [PlayerController::class,'update']);
route::delete('/players/{player}', [PlayerController::class,'delete']);
