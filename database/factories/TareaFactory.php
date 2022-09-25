<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Tarea::class;
    public function definition()
    {
        //$codTarea=$this->faker->sentence(); //lo hago para generar url amigables
        return [
           // 'slug' =>str::slug($codTarea,'-'),  No deseo implementar
           
            'codigo' => $this->faker->RandomElement(['TAR-100-001','TAR-200-002','TAR-200-002','TAR-200-002']),
            'descripcion' => $this->faker->sentence(),
            
        ];
    }
}
