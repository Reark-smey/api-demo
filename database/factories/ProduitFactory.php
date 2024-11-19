<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->word(),
            'description' => fake()->sentence(),
            'lien_image' => 'https://picsum.photos/seed/'.fake()->numerify().'/150/200',
            'prix'=>fake()->randomFloat(2,5,120),
            'tva' =>fake()->randomFloat(1,0,10),
        ];
    }
}
