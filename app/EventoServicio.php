<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoServicio extends Model
{
    //
    
    protected $fillable=[
        'evento_id', 'servicio_id', 'cantidad', 'regalo'
    ];

    public function TipoServicio(){
        return $this->hasOne(servicio::class);
    }
}
