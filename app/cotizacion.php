<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class cotizacion extends Model
{
    //
    protected $fillable =[
        'cliente_id', 'user_id', 'title', 'subtitle', 'start', 'end', 'invitados'
    ];

    protected $dates = [
        'start', 'end'
    ];

   public function cliente()
   {
       return $this->belongsTo(cliente::class);
   }

   public function usuario()
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
