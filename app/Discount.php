<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['amount','evento_id','cotizacion_id'];

    /**
     * Boot del modelo para agregar validaciones
     */
    protected static function boot()
    {
        parent::boot();

        // Validar que al menos evento_id o cotizacion_id esté presente
        static::creating(function ($discount) {
            if (empty($discount->evento_id) && empty($discount->cotizacion_id)) {
                throw new \Exception('El descuento debe estar asociado a un evento o a una cotización');
            }
        });

        static::updating(function ($discount) {
            if (empty($discount->evento_id) && empty($discount->cotizacion_id)) {
                throw new \Exception('El descuento debe estar asociado a un evento o a una cotización');
            }
        });
    }

    /* Relación evento */
    public function evento()
    {
        return $this->belongsTo(evento::class, 'evento_id');
    }

    /* Relación cotización */
    public function cotizacion()
    {
        return $this->belongsTo(cotizacion::class, 'cotizacion_id');
    }

}
