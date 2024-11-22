<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function ajoutcommande($idClient, $idProduit, $qte)
    {
        $commande = new Commande();
        $commande->id_client=$idClient;
        $commande->id_produit=$idProduit;
        $commande->quantite=$qte;
        $commande->date=now();
        $commande->save();

        return response()->json(['status'=>'commande créée','data'=>$commande]);
    }
    public function ajouterCommandeJSON(Request $request)
    {
        $commande = new Commande();
        $commande->id_client=$request->json('idClient');
        $commande->id_produit=$request->json('idProduit');
        $commande->quantite=$request->json('qte');
        $commande->date=now();
        $commande->save();

        return response()->json(['status'=>'commande créée','data'=>$commande]);
    }
}
