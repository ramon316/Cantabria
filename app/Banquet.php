<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banquet extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'entry',
        'steak',
        'sauce',
        'others',
        'fitting',
        'notes'
    ];

    public function evento(){
        return $this->belongsTo(evento::class);
    }
}
