<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
    //
    protected $fillable = ['banco', 'cuenta', 'clabe', 'moneda'];

    /* ocultamos la informaicón solo el nombre de la cuenta */
    protected $visible = ['cuenta'];

    public function pagos()
    {
        return $this->hasMany(pago::class);
    }
}
