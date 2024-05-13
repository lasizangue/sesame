<?php

namespace Database\Factories;

use App\Models\Conteneur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conteneur>
 */
class ConteneurFactory extends Factory
{
    protected $model = Conteneur::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numTc' => $this->faker->swiftBicNumber,
            'typeTc' => array_rand(["TC20", "TC40"], 1),
            'dossier_id' => rand(1, 200),
        ];
    }
}
