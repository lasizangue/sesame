<?php

namespace Database\Factories;

use App\Models\Dossier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
    protected $model = Dossier::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dateOrdreLivraison' => $this->faker->date("2023-01-01", "2023-12-31"),
            'numDossier' => $this->faker->unique()->numberBetween(1, 9999) . 'TGR',
            'typeDossier' => array_rand(['import', 'export'], 1),
            'modeTransport' => array_rand(['aerien', 'ferroviaire', 'maritime', 'terrestre'], 1),
            'regimeDouanier' => array_rand(['d6', 'd8', 'd3'], 1),
            'fournisseur' => $this->faker->text(),
            'connaissement' => $this->faker->lastName(),
            'nbreTc20' => $this->faker->numberBetween(15, 7596),
            'nbreTc40' => $this->faker->numberBetween(15, 7596),
            'nbreColis' => $this->faker->numberBetween(1, 1000) . ' ' . 'cartons',
            'marchandise' => array_rand(['produits cosmetiques', 'vehicules', 'effets personnel', 'Divers articles', 'produits alimentaires', 'produits agricoles'], 1),
            'danger' => rand(0, 1),
            'poidsBrut' => $this->faker->randomNumber(1, 999999),
            'dateOuverture' => $this->faker->dateTimeBetween("2023-01-01", "2023-12-31"),
            'statuCoter' => rand(0, 1),
            'statuValider' => rand(0, 1),
            'statuMisEnLivraison' => rand(0, 1),
            'statuBae' => rand(0, 1),
            'statuLivrer' => rand(0, 1),
            'dosMultiDeclaration' => rand(0, 1),
            'user_id' => rand(1, 100),
            'client_id' => rand(1, 25),
            'compagnie_id' => rand(1, 100),
            'transporteur_id' => rand(1, 100),
            'buro_id' => rand(1, 100),
            'acconier_id' => rand(1, 100),
        ];
    }
}
