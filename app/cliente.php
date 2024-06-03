<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    //
    use HasFactory;
    
    protected $fillable =[
        'nombre', 'telefono','email', 'calle', 'numero', 'colonia', 'cp'
    ];

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
}
