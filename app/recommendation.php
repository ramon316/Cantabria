<?php

namespace App;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class recommendation extends Model
{
    use HasFactory;

    protected $primarykey = [
        'id'
    ];

    protected $fillable = [
        'name',
        'comment',
        'image'
    ];

    public function getUrlImageAttribute(){
        return Storage::url($this->image);
    }
}
