<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class interested extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'message'];
}
