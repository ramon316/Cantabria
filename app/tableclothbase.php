<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableclothbase extends Model
{
    use HasFactory;
    
    protected $fillable = ['color', 'amount', 'tabletype', 'status', 'image', 'comment'];
}
