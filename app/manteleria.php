<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manteleria extends Model
{
    protected $fillable = [];

    public function evento(){
        return $this->belongsTo(evento::class, 'evento_id');
    }
}
