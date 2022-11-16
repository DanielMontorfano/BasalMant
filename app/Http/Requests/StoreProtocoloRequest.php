<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProtocoloRequest extends FormRequest
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
        return [
                'descripcion'=>'required|min:10',
           
        ];
    }

    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
           
            'descripcion'=>'la descripción',
           

        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            
            'descripcion.required'=>'debe tener mínimo 10 caracteres',
          
           
                       
        ];
    }

}
