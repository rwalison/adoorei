<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::get('produtos', [ProductController::class, 'index']);

Route::prefix('vendas')->controller(SaleController::class)->name('sale')->group(function (){
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/adicionar', 'store');
    Route::patch('/atualizar/{id}', 'update');
    Route::delete('/cancelar/{id}', 'destroy');
});
