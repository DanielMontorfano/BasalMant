<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenCerrarRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autorización para que funcione
    }

    public function rules()
    {
        
        return [
            'equipo_id' => 'required|numeric',
            'aprobadoPor' => 'required|string|min:5|max:255',
            'realizadoPor' => 'required|string|max:255',
            //'fechaEntrega' => 'nullable|required',
           // 'fechaAprobado' => 'nullable|required|date',
            'det2' => 'required|string|min:10|max:500',
            'det3' => 'nullable|string|max:500', // Si det3 es opcional
        ];
    }

    public function attributes()
    {
        return [
            'aprobadoPor' => 'Sector o persona que aprueba la O.T.',
            'realizadoPor' => 'Sector o persona que realizó el trabajo',
            'det2' => 'Descripción del trabajo realizado',
        ];
    }

    public function messages()
    {
        return [
            'aprobadoPor.required' => 'Se necesita ingresar la persona que aprueba.',
            //'fechaAprobado.required' => 'Se necesita ingresar la fecha de aprobación.',
            'realizadoPor.required' => 'Se necesita ingresar la persona que realizó el trabajo.',
            'det2.required' => 'Se necesita ingresar una breve descripción del trabajo.',
        ];
    }
}
