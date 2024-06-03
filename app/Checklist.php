<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'contrato',
        'ademdum',
        'manteleria',
        'floral',
        'degustacion',
        'banquete',
    ];

    /* relación checklist with evento */
    /**
     * Get the evento that owns the Checklist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento(): BelongsTo
    {
        return $this->belongsTo(evento::class);
    }
}
