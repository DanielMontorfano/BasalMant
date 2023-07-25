<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lubricacion;
use Illuminate\Support\Facades\Log;

class SearchLubricController extends Controller
{
   



    public function lubricaciones(Request $request)
    {
        $term = $request->input('term');
        
        // Registrar un mensaje indicando que el método se ha llamado correctamente
        //Log::info('El método lubricaciones se ha llamado.');

        $results = Lubricacion::where(function ($query) use ($term) {
            $query->where('id', 'LIKE', '%' . $term . '%')
                ->orWhere('puntoLubric', 'LIKE', '%' . $term . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $term . '%')
                ->orWhere('lubricante', 'LIKE', '%' . $term . '%')
                ->orWhere('color', 'LIKE', '%' . $term . '%');
        })->get();

        $formattedResults = [];
        foreach ($results as $lubricacion) {
            $formattedResults[] = [
                'id' => $lubricacion->id,
                'value' => "Referencia Nº" . $lubricacion->id . ": " . "Punto de lubricación: " . $lubricacion->puntoLubric ." ". "Desc: " . $lubricacion->descripcion ." " . "Lubric: " . $lubricacion->lubricante . ' ' . $lubricacion->color,
            ];
        }

        return response()->json($formattedResults);
    }
}


