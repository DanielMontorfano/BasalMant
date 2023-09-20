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
        ->withPivot('cant','unidad','check1');
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
    // **********************************************Ultimo para PLAN
    public function equiposPlans()
    {
        return $this->belongsToMany('App\Models\Plan', 'equipoplans','equipo_id','plan_id'); //Personalizo nombre la tabla  pivot  y el campo clave primaria
       // ->withPivot('cant','unidad','check1');
        //->withTimestamps();
       // return $this->belongsToMany('App\Models\Repuesto', 'equipo_repuestos', 'equipo_id', 'repuesto_id');
    }
    
    public function equiposPlansejecut()
    {
        return $this->belongsToMany('App\Models\Plan', 'equipoplansejecut','equipo_id','plan_id'); //Personalizo nombre la tabla  pivot  y el campo clave primaria
       // ->withPivot('cant','unidad','check1');
        //->withTimestamps();
       // return $this->belongsToMany('App\Models\Repuesto', 'equipo_repuestos', 'equipo_id', 'repuesto_id');
    }
    public function equiposAEquiposB()
    {
        return $this->belongsToMany('App\Models\Equipo', 'equipo_equipos','equipo_id','vinc_id'); //Personalizo nombre la tabla  pivot  y el campo clave primaria
       // ->withPivot('cant','unidad','check1');
        //->withTimestamps();
       // return $this->belongsToMany('App\Models\Repuesto', 'equipo_repuestos', 'equipo_id', 'repuesto_id');
    }
     
    public function equiposBEquiposA()
    {
        return $this->belongsToMany('App\Models\Equipo','equipo_equipos','equipo_id','vinc_id'); //Caso particular
       // ->withPivot('cant','unidad');
        
        
    } 


    public function equiposTareash()
    {
        return $this->belongsToMany('App\Models\Tarea', 'tareashes', 'equipo_id', 'tarea_id')
        ->withPivot('plan_id','tcheck','detalle', 'operario', 'supervisor', 'updated_at');
        //->withTimestamps();
       // return $this->belongsToMany('App\Models\Repuesto', 'equipo_repuestos', 'equipo_id', 'repuesto_id');
    }

   /* public function lubricaciones()
    {
        return $this->belongsToMany(Lubricacion::class, 'equipo_lubricacion', 'equipo_id', 'lubricacion_id')
            ->withPivot(['dia', 'turno', 'lcheck', 'responsables']);
    }*/


    public function lubricaciones()
{
    return $this->belongsToMany(Lubricacion::class, 'equipo_lubricacion', 'equipo_id', 'lubricacion_id')
        ->withPivot(['numMuestra','dia', 'turno', 'muestra', 'responsables']);
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
