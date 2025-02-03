<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lights extends Model
{
    use HasFactory;

    protected $fillable = [
        'color1',
        'color2',
        'color3',
        'evento_id',
    ];

    protected $lights = [
        'R','G',
        'B',
        'W',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12',
    ];

    public function getLights()
    {
        return $this->lights;
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
