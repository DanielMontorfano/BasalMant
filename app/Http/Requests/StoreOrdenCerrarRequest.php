<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenCerrarRequest extends FormRequest
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
        return ['equipo_id'=>'required|numeric',
                'aprobadoPor'=>'required|min:5',
               // 'fechaNecesidad'=>'required',
                'realizadoPor'=>'required',
                'det2' =>'required|min:10|max:500',
                //'det1'=>'required|min:10|max:500',


            
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
          
            'aprobadoPor'=>'Sector o persona que aprueba la O.T.',
            'realizadoPor'=>'Sector o persona que aprueba la O.T.',
            'det2'=>'Descripción del trabajo realizado',
           



        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            
            'aprobadoPor.required'=>'Se necesita ingresar la persona que aprueba',
            'realizadoPor.required'=>'Se necesita ingresar la persona que hizo el trabajo',
            'det2.required'=>'Se necesita ingresar breve descripción del trabajo', 
           
           
        ];
    }
}
