<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratorioXConsulta extends Model
{
    use HasFactory;

    protected $fillable = ['laboratorio_id',
    'consulta_id','estado'];
}
