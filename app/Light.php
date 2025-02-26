<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'control',
        'color',
        'evento_id',
    ];

    protected $lights = [
        'R',
        'G',
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

    protected $control = [
        'control 1',
        'control 2',
        'control 3',
    ];

    public function getLights()
    {
        return $this->lights;
    }

    public function getControls()
    {
        return $this->control;
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
