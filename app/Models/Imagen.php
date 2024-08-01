<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_imagen_id', 'cie10_id',    'consulta_id','estado'];



    public function tipoImagenes()
    {
        return $this->belongsTo(TipoImagen::class,'tipo_imagen_id');
    }

    public function consultas()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function ciediez(){

        return $this->belongsTo(Cie10::class, 'cie10_id');
    }
}
