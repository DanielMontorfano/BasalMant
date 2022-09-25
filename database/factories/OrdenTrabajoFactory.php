<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenTrabajo>
 */
class OrdenTrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'equipo_id' => $this->faker->RandomElement([20,12,3,8,9,10,11,12,13,16,17,4,25]), 
            'de' => $this->faker->RandomElement(['Fabrica','Trapiche','Taller Usina','Intrumental']),
            'para' => $this->faker->RandomElement(['Fabrica','Trapiche','Taller Usina','Intrumental']),
            'per_abre' => $this->faker->RandomElement(['Jose','Pedro','Anibal','PAblo', 'Ramon']),
            'det1' => $this->faker->sentence(),
            'per_cierra' => $this->faker->RandomElement(['Jose','Pedro','Anibal','PAblo', 'Ramon']),
            'det2' => $this->faker->sentence(),
             

            'estado' => $this->faker->RandomElement(['Abierta','Cerrada']),
            'creador' => $this->faker->RandomElement(['Cavana','Apaza','Borja','Pablo Moreno']),
        ];
    }
}
