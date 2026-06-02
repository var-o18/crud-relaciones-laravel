<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fabricante extends Model
{
    protected $fillable = [
        'nombre',
        'pais',
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
