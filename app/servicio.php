<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    //
    protected $fillable = [
        'nombre', 'costo', 'invitados', 'descripcion', 'categoria', 'dias', 'año'
    ];

    public function evento(){
        return $this->belongsToMany(evento::class)->withPivot('evento_id','cantidad','costo','regalo');
    }

    public function cotizacion(){
        return $this->belongsToMany(cotizacion::class)->withPivot('cotizacion_id','cantidad','costo','regalo');
    }
}
