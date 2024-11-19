<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProduitController
{
    function liste(){
        return response()->json(Produit::all());
}
    function details($id){
        return response()->json(Produit::query()->find($id));


    }

}
