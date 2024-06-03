<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    //
    protected $fillable= [
        'invitados', 'renta', 'decoracion', 'dulces', 'postres', 'bebidas', 'pastel', 'meseros', 'dias',
    ];
}
