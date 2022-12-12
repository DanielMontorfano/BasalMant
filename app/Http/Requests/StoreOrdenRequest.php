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
        return ['equipo_id'=>'required|numeric',
                'solicitante'=>'required|min:5',
               // 'fechaNecesidad'=>'required',
                'asignadoA'=>'required',
                'prioridad' =>'required',
                'det1'=>'required|min:10|max:500',


            
        ];
    }
    public function attributes() //Fabuloso!! personalizar mensaje
    {
        return[
          
            'solicitante'=>'Sector o persona que emite la O.T.',
            'fechaNecesidad'=>'Fecha que se requiere el trabajo',
            'asignadoA'=>'Quien recibe',
            'prioridad' =>'Nivel de prioridad',
            'det1' =>'descripcion de la orden',



        ];
    }

    public function messages() //Mejor Aun, personalizar!!
    {
        return[
            
            'solicitante.required'=>'Se necesita ingresar solicitante',
            'fechaNecesidad.required'=>'Se necesita ingresar la fecha',
            'asignadoA.required'=>'Se necesita ingresar a quien se le entrega', 
            'prioridad.required'=>'Se necesita la prioridad',
            'det1.required' =>'Debe contener entre 10 y 500 caracteres', 
           
        ];
    }
}
