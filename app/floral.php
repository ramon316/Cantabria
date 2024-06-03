<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class floral extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'description', 'image'];
}
