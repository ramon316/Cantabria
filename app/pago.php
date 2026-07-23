<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class pago extends Model
{
    // Constantes de estado
    const STATUS_PENDIENTE = 'pendiente';
    const STATUS_VALIDADO = 'validado';
    const STATUS_RECHAZADO = 'rechazado';

    protected $fillable = ['monto', 'tipo', 'status', 'user_id_validator', 'observaciones', 'cliente_id', 'user_id', 'evento_id', 'cuenta_id'];
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

    public function cliente(){
        return $this->belongsTo(cliente::class);
    }

    /**
     * Usuario que validó el pago
     */
    public function validator(){
        return $this->belongsTo(User::class, 'user_id_validator');
    }

    /**
     * Scope para filtrar pagos pendientes
     */
    public function scopePendientes($query){
        return $query->where('status', self::STATUS_PENDIENTE);
    }
}
