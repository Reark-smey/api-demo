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

Route::get('ListeCommandeClient', [CommandeController::class,"ListeCommandeClient"])->middleware('auth:sanctum');

Route::get('commandes/{idClient}', [CommandeController::class,"listerCommandes"])->middleware('auth:sanctum');

Route::get('commandes', [CommandeController::class, "listerCommandesProduits"])->middleware("auth:sanctum");

Route::DELETE('suppcommande', [CommandeController::class, "supprimerCommande"])->middleware("auth:sanctum");

Route::POST('ajoutclient', [CommandeController::class,"ajouterClient"])->middleware("auth:sanctum");
