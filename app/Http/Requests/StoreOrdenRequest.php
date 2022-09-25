<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;      //Modificadop a true para que funcione!!
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return ['equipo_id'=>'required|max:15',
                'de'=>'required|min:1',
                'para'=>'required',
                'det1'=>'required',
                'per_abre' =>'required',
                


            
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
            'equipo_id'=>'Codigo de equipo',
            'de'=>'Sector que emite la O.T.',
            'para'=>'A quien va dirigida la O.T.',
            'per_abre'=>'Quien firma la O.T.',
            



        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            'equipo_id.required'=>'Se necesita ingresar el codigo del Equipo',
            'de.required'=>'Se necesita ingresar de',
            'para.required'=>'Se necesita ingresar para',
            'det1.required'=>'Se necesita ingresar el detalle', 
            'per_abre.required'=>'Se necesita su firma', 
           
        ];
    }
}
