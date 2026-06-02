<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fabricante_id',
    ];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function fichaTecnica(): HasOne
    {
        return $this->hasOne(FichaTecnica::class);
    }
}
