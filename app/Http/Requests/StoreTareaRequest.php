<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
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
        return ['codigo'=>'required|min:11|max:11',
                'descripcion'=>'required|min:5',
                'duracion'=>'required|min:1|max:2',
                
                                           
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
            'codigo'=>'el código',
            'descripcion'=>'la descripción',
            'duracion'=>'la duración',
            
            

        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            'codigo.required'=>'el codigo debe tener 11 caracteres',
            'descripcion.required'=>'debe tener mínimo 30 caracteres',
            'duracion.required'=>'Se necesita ingresar la duración',
           
                       
        ];
    }
}
