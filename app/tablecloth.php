<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablecloth extends Model
{
    use HasFactory;

    protected $fillable = ['tonality', 'name', 'amount', 'image', 'status', 'tabletype'];

    
}
