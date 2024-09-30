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

        if ($estado === 'estado1') {
            $this->color = 'green';
        } elseif ($estado === 'estado2') {
            $this->color = 'yellow';
        } elseif ($estado === 'estado3') {
            $this->color = 'red';
        } else {
            // Si el estado no es ninguno de los definidos, por defecto se establecerá en gris o cualquier otro color que desees.
            $this->color = 'gray';
        }
    }

    public function render()
    {
        return view('components.semaforo');
    }
}
