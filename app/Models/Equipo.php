<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repuesto;

class Equipo extends Model
{
    use HasFactory;
    //Esto sirve para Asignacion Masiva, es de seguridad. Defino los campos que quiero guardar
    protected $fillable =['codEquipo',
    'marca',
    'modelo',
    'idSecc'
    
    
];
//Otra dor de hacer lo mismo
 //  protected $guarded =['status']; //este campo seria protegido, no guardado, (complemteo de lo anterior)

 public function getRouteKeyName() // esto tiene que ver para generar url amigables
    {
        return 'slug';
    }
    // relacion de uno a muchos
   // public function equipoRepuestoSolo(){
   // return $this->hasMany('App\Models\EquipoRepuesto');
   // }
    //relacion de muchos a muchos
    public function equiposRepuestos()
    {
        return $this->belongsToMany('App\Models\Repuesto')
        ->withPivot('cant','check1');
        //->withTimestamps();
       // return $this->belongsToMany('App\Models\Repuesto', 'equipo_repuestos', 'equipo_id', 'repuesto_id');
    }
     
    

    public function fotos()
    {
        return $this->hasMany('App\Models\Foto'); //Por ahora no cambio conveniccion de nombres
    }

    public function ordentrabajo()
    {
        return $this->hasMany('App\Models\OrdenTrabajo'); //Por ahora no cambio conveniccion de nombres
    }

    
    public function documentos()
    {
        return $this->hasMany('App\Models\Documento'); //Por ahora no cambio conveniccion de nombres
    }
    


 //   public function products()
//{
 //   return $this->belongsToMany('App\Product')
 //   	->withPivot('products_amount', 'price')
 //   	->withTimestamps();
 //}

 //foreach ($shop->products as $product)
//{
  //  echo $product->pivot->price;
//}

}
