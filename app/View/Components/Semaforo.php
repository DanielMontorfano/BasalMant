<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Semaforo extends Component
{
    public $estado;
    public $color;

    public function __construct($estado)
    {
        $this->estado = $estado;

        // Mapeo de estados a colores
        $colores = [
            'estado1' => 'green',
            'estado2' => 'yellow',
            'estado3' => 'red',
        ];

        // Asigna el color según el estado, por defecto gris si no existe
        $this->color = $colores[$estado] ?? 'gray';
    }

    public function render()
    {
        return view('components.semaforo');
    }
}
