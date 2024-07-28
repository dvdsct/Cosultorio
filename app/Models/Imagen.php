<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_imagen_id', 'cie10_id',    'estado'];



    public function tipoImagenes()
    {
        return $this->belongsTo(TipoImagen::class,'tipo_imagen_id');
    }

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'imagen_x_consultas');
    }

    public function ciediez(){

        return $this->belongsTo(Cie10::class, 'cie10_id');
    }
}
