<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImagen extends Model
{
    use HasFactory;

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}
