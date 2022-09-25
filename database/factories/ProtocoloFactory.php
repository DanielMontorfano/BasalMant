<?php

namespace Database\Factories;
use App\Models\Protocolo;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Protocolo>
 */
class ProtocoloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Protocolo::class;
    public function definition()
    {
        return [
            'codigo' => $this->faker->RandomElement(['PROT-100-001','PROT-200-002','PROT-200-002','PROT-200-002']),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
