<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteXMedico extends Model
{
    use HasFactory;

    protected $fillable = ['medico_id','paciente_id','estado'];

}
