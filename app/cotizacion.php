<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
/* Spatie Activity Log */
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class cotizacion extends Model
{
    use LogsActivity;
    //
    protected $fillable =[
        'cliente_id', 'user_id', 'title', 'subtitle', 'start', 'end', 'invitados'
    ];

    protected $dates = [
        'start', 'end'
    ];

    /* protected static function boot()
    {
        parent::boot();
        static::creating(function ($cotizacion) {
            $cotizacion->user_id = auth()->id();
        });
    } */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['cliente.nombre','user.name'])
        ->useLogName('Cotización')
        ->setDescriptionForEvent(function(string $eventName){
            if ($eventName === 'created') {
                return "Se genero una cotización";
            }elseif ($eventName === 'updated') {
                return "Se actualizo una cotización";
            } else{
                return "Se elimino una cotización";
            }
        })
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

   public function cliente()
   {
       return $this->belongsTo(cliente::class);
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
   public function perfil()
   {
       return $this->belongsTo(Pefil::class);
   }

   public function servicio(){
    return $this->belongsToMany(servicio::class)->withPivot('servicio_id','cantidad','costo','regalo');
   }
}
