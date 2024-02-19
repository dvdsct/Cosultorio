<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaXConsulta extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado', 'consulta_id','receta_id'
    ];
}
