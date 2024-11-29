<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;

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

    public function listerCommandes($idClient){

        $commandes = Client::find($idClient)->commandes()->get();
        return response()->json([$commandes]);
    }

    public function listerCommandesProduits(Request $request){
        $idclient=$request->json('idClient');
        $commande = Client::find($idclient)->commandes()->with('Produit')->get();

        return response()->json([$commande]);
    }

    public function supprimerCommande(Request $request){
        try{
        $idcommande = $request->json('idCommande');
        Commande::destroy($idcommande);
        $success = "La suppression a été réussi de la commande numéro : ".$idcommande." a réussi";
        return $success;
    }catch(\Exception $e){
            $erreur = $e->getMessage();
        }
    }
}
