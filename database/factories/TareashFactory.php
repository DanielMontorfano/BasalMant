<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tareash>
 */
class TareashFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'slug' =>str::slug($codTarea,'-'),  No deseo implementar
            'equipo_id' => $this->faker->RandomElement([ 1,2]),
            'tarea_id' => $this->faker->RandomElement([ 1,2,3,4,5,6,7,8,9,10,45,46,47,48]),
             'plan_id' => $this->faker->RandomElement([ 1,2,3,4]),
             'tcheck' => $this->faker->RandomElement([ 'R','NN','I']),
             
             'detalle' => $this->faker->sentence(),
             'operario' => $this->faker->RandomElement([ 'Juan','Peter','Mamani','Calizaya']),
             
         ];
    }
}
