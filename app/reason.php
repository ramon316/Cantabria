<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reason extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['reason'];
    
    public function meets(){
        return $this->hasMany(meet::class);
    }
}
