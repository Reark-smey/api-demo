<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produits', [ProduitController::class, "liste"])->middleware('auth:sanctum');;

Route::get('/produits/{id}', [ProduitController::class, "details"])->middleware('auth:sanctum');

Route::POST('/ajoutcommande/{id}/{idproduit}/{qte}', [CommandeController::class, "ajoutcommande"])->middleware('auth:sanctum');;
Route::POST('/ajoutcommande', [CommandeController::class, "ajouterCommandeJSON"])->middleware('auth:sanctum');;

Route::post('/login',[AuthController::class, "login"]);
Route::get('/logout',[AuthController::class, "logout"])->middleware('auth:sanctum');

Route::get('/unauthorized', [AuthController::class,"unauthorized"])->name('login');
