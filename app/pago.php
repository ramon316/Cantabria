<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class pago extends Model
{
    protected $fillable = ['monto', 'tipo'];
    protected $dates = ['created_at', 'updated_at'];

    public function tipo(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => $value,
        );
    }

    public function evento(){
        return $this->belongsTo(evento::class);
    }

    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
