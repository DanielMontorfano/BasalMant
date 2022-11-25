<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return ['codigo'=>'required|max:10',
                'nombre'=>'required|min:1',
                'frecuencia'=>'required',
                'unidadSelect'=>'required',
                'descripcion' =>'required',
                


            
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
            'codigo'=>'Codigo de Plan',
            'nombre'=>'Nombre que desee',
            'frecuencia'=>'Cada cuanto',
            'unidad'=>'Unidad de tiempo',
            'descripcion'=>'Descripción',
            



        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            'codigo.required'=>'Se necesita ingresar el codigo de 12 caracteres',
            'nombre.required'=>'Se necesita ingresar un nombre',
            'frecuencia.required'=>'Se necesita ingresar la frecuencia',
            'unidad.required'=>'Se necesita ingresar la unidad', 
            'descripcion.required'=>'Se necesita una descripción', 
           
        ];
    }
}
