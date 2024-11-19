<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

/**
 * Class Produit
 *
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property string $lien_image
 * @property float $prix
 * @property float $tva
 *
 * @property Collection|Commande[] $commandes
 *
 * @package App\Models
 */
class Produit extends Model
{
    use HasFactory, Notifiable;
	protected $table = 'produits';
	public $timestamps = false;

	protected $casts = [
		'prix' => 'float',
		'tva' => 'float'
	];

	protected $fillable = [
		'nom',
		'description',
		'lien_image',
		'prix',
		'tva'
	];

	public function commandes()
	{
		return $this->hasMany(Commande::class, 'id_produit');
	}
}
