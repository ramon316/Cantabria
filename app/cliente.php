<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
/* Spatie Activity Log */
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class cliente extends Model
{
    //
    use HasFactory;
    use Notifiable;
    use LogsActivity;

    protected $fillable =[
        'nombre', 'telefono','email', 'calle', 'numero', 'colonia', 'cp', 'user_id'
    ];

    /* Spatie Activity Log */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nombre','user.name'])
        ->useLogName('Clientes')
        ->setDescriptionForEvent(function(string $eventName){
            if ($eventName === 'created') {
                return "Creación de un evento";
            }elseif ($eventName === 'updated') {
                return "Se actualizo un evento";
            } else{
                return "Se elimino un evento";
            }
        })
        ->logOnlyDirty();

        // Chain fluent methods for configuration options
    }

    /* Creamos un mutador para siempre agregar el user_id al cliente creado */
 /*    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cliente) {
            $cliente->user_id = auth()->id();
        });
    } */

    /**Relación de 1:n entre loc clientes y los eventos */
    /**
     * Get all of the Eventos for the cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Eventos()
    {
        return $this->hasMany(evento::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(cotizacion::class);
    }

    public function meet(){
        return $this->hasMany(meet::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
