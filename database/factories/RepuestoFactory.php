<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Repuesto;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repuesto>
 */
class RepuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Repuesto::class;
    public function definition()
    {
        return [
            
            'codigo' => $this->faker->RandomElement(['5950 0001','6050 0002','3941 0003','2562 0004']),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
