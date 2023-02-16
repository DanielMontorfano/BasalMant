<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepuestoRequest extends FormRequest
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
        return ['codigo'=>'required|min:9|max:9',
                //'duracion'=>'required|min:1|max:2',
                
                                           
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[ 'codigo'=>'el código',
                //'duracion'=>'la duración',
            ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            
            'codigo.required'=>'debe tener 9 caracteres',
           // 'duracion.required'=>'Se necesita ingresar la duración',
           
                       
        ];
    }
}
