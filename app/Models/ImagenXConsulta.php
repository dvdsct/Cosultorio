<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenXConsulta extends Model
{
    use HasFactory;

    protected $fillable = ['consulta_id',	'imagen_id',	'estado',];
}
