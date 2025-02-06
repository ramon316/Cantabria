<?php

namespace App;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'color', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**Este es un evento cuando el usuario es creado */
    protected static function boot(){
        parent::boot();
        //Asignar perfil cuando se halla creado el usuario nuevo
        static::created(function($user){
            $user->perfil()->create();
        });
    }




    /**
     * Get all of the Eventos for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Eventos()
    {
        return $this->hasMany(evento::class);
    }

    /**Relacion que tiene el usuario con las cotizaciones */
    public function cotizaciones()
    {
        return $this->hasMany(cotizacion::class);
    }

    /**Relación de 1 a 1 entre usuario y perfil */
    /**
     * Get the perfil associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    public function meet()
    {
        return $this->hasMany<(meet::class);
    }

    public function pagos()
    {
        return $this->hasMany(pago::class);
    }

    /* public function role()
    {
        return $this->hasOne(Role::class);
    } */

    /**Metodos de Admin LTE */
    /**Recuperar la imagen del usuario */
    public function adminlte_image(){
        if (Auth::user()->perfil->imagen) {
            return asset(Auth::user()->perfil->url_imagen);
        }
        else{
            /* return asset('perfils') . '/' . 'default.png'; */
           return Storage::url('perfils/default.png');
        }
    }
    /**Recuperamos el rol del usuario */
    public function adminlte_desc(){
        return Auth::user()->role;
    }
    /**Ver la pagina del usuario */
    public function adminlte_profile_url(){
        return route('perfils.index');
    }
}
