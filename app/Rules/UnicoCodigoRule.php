<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Repuesto;

class UnicoCodigoRule implements Rule
{
    public function passes($attribute, $value)
    {
        return !Repuesto::where('codigo', $value)->exists();
    }

    public function message()
    {
        return 'El :attribute ya existe en la tabla de repuestos.';
    }
}


