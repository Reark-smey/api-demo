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

    public function ajouterClient(Request $request){
        try {
            $client = new Client();
            $mail_client = $client->email = $request->json('email');
            $client_email = Client::select(['email'])->where('email','=',$mail_client)->first();
            $client->nom = $request->json('nom');
            $client->prenom = $request->json('prenom');
            $client->password = bcrypt($request->json('password'));
            if ($client_email) {
                $erreur = "L'email a déjà été utilisé. Veuillez saisir un nouvel email";
                } else {
                $client->save();
            }
            return response()->json(['status' => 'Client créée', 'data' => $client]);
        }catch(\Exception $e){
            $erreur = $e->getMessage();
        }

    }
}
