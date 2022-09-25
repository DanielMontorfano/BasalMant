<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Plan::class;
    public function definition()
    {
        return [
            
            'codigo' => $this->faker->RandomElement(['PLAN-100-001','PLAN-200-002','PLAN-200-002','PLAN-200-002']),
            'descripcion' => $this->faker->sentence(),
        ];
    }
}
