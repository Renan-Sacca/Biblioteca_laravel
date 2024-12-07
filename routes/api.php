<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\CategoriaController; 
use App\Http\Controllers\LivroController; 
use App\Http\Controllers\ClienteController; 
use App\Http\Controllers\VendaController; 



Route::post('/auth/login', [AuthController::class, 'login']);

Route::get("/items", [ItemController::class, 'get']);
Route::post("/items", [ItemController::class, 'store']);

Route::group(['middleware' => 'jwt.auth'], function() {
    Route::apiResource('autores', AutorController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('livros', LivroController::class);
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('vendas', VendaController::class);

});