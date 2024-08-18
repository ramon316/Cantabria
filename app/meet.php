<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cliente_id',
        'user_id',
        'title',
        'reason_id',
        'start',
        'contrato',
        'color',
        'observacion',
    ];

    protected $dates = ['start'];

    public function cliente(){
        return $this->belongsTo(cliente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reason()
    {
        return $this->belongsTo(reason::class);
    }

}
