<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * Class Commande
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_produit
 * @property int $quantite
 * @property Carbon $date
 *
 * @property Client $client
 * @property Produit $produit
 *
 * @package App\Models
 */
class Commande extends Model
{
    use HasFactory, Notifiable;
	protected $table = 'commandes';
	public $timestamps = false;

	protected $casts = [
		'id_client' => 'int',
		'id_produit' => 'int',
		'quantite' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'id_client',
		'id_produit',
		'quantite',
		'date'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'id_client');
	}

	public function produit()
	{
		return $this->belongsTo(Produit::class, 'id_produit');
	}
}
