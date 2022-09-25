<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planproto extends Model
{
    use HasFactory;

    public function protocoloPlans(){
        return $this->belongsTo('App\Models\Plan');
    }
    public function plansProtocolos(){
        return $this->belongsTo('App\Models\Protocolo');
    }
}
