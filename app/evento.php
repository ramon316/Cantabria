<?php

namespace App;

use App\Tipo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class evento extends Model
{
    use Notifiable;

    // Define los colores que quieres usar
    const COLOR_EMPRESARIAL = '#FF0000'; // Rojo
    const COLOR_SOCIAL = '#0000FF'; // Azul

    protected $dates = ['start', 'end'];

    protected $fillable = [
        'id', 'cliente_id', 'user_id', 'title', 'subtitle', 'horas', 'start', 'end', 'invitados', 'color', 'layout', 'contract', 'closed_at',
    ];

    protected $casts = [
        'start'         => 'datetime:d-m-Y H:m',
        'end'           =>  'datetime:d-m-Y H:m',
        'created_at'    =>  'datetime:d-m-Y H:m',
        'updated_at'    =>  'datetime:d-m-Y H:m',
    ];

    /*Generamos un mutador para darle formato a nuestro titulo */
    public function title(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => $value,
        );
    }


    /**
     * Get the Clientes that owns the evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**Creamos un regirstro en manteleria y en banquete si así lo requiere ya que de esa manera
     * podemos saber si esta vacio o no
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function($evento){
           $evento->setColorBaseOnTitle();

        });

        static::updating(function($evento){
            $evento->setColorBaseOnTitle();
        });
    }

    public function setColorBaseOnTitle(){
        if ($this->title == "Empresarial") {
            $this->color = self::COLOR_EMPRESARIAL;
        }
        elseif ($this->title == "Social") {
            $this->color = self::COLOR_SOCIAL;
        }
        else {
            $this->color = "008f39";
        }
    }

    public function cliente()
    {
        return $this->belongsTo(cliente::class,'cliente_id');
    }

    /**
     * Get the tipo that owns the evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function servicio()
    {
        return $this->belongsToMany(servicio::class,'evento_servicio')->withPivot('servicio_id','cantidad', 'costo','regalo')
        ->withTimestamps();
    }
    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    /* I generate the relationship between tablecloth and event */
    public function tablecloth(){
        return $this->belongsToMany(tablecloth::class,'evento_tablecloth')->withPivot('amount');
    }

    /* I generate the relationship between tableclothbase and event */
    public function tableclothbase(){
        return $this->belongsToMany(tableclothbase::class,'evento_tableclothbase')->withPivot('amount');
    }

    public function pagos(){
        return $this->hasMany(pago::class);
    }

    public function banquet(){
        return $this->hasOne(Banquet::class);
    }

    /**
     * Get the user associated with the evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Checklist(): HasOne
    {
        return $this->hasOne(Checklist::class, 'evento_id');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function floralbase()
    {
        return $this->belongsToMany(floralbase::class)->withPivot('napkins','plates','amount');
    }

    /* Get attributes */


}
