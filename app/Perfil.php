<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Perfil extends Model
{
    protected $fillable = [
        'telefono', 'imagen'
    ];

    public function getUrlImagenAttribute(){
        return Storage::url($this->imagen);
    }

    /**Relación 1 a 1 entre el perfil y el usuario */
    /**
     * Get the user associated with the Perfil
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
