<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Produit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_client' => fake()->randomElement(Client::pluck('id')) ,
            'id_produit'=> fake()->randomElement(Produit::pluck('id')) ,
            'quantite' => fake()->numberBetween(1,15),
            'date'=> fake()->date(),
        ];
    }
}
