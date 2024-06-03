<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chair extends Model
{
    use HasFactory;

    protected $fillable = ['typechair', 'color', 'amount'];
}
