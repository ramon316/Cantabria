<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class floralbase extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'category', 'image'];

    public function evento(){
        return $this->belongsToMany(Evento::class)->withPivot('napkins','plates','amount');
    }
}
