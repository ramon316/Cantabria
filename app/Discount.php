<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['amount','evento_id'];

    /* Relación evento */
    public function evento()
    {
        return $this->belongsTo(evento::class, 'evento_id');
    }

}
