<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultasXMedico extends Model
{
    use HasFactory;
    protected $fillable = ['medico_id','consulta_id','estado'];

}
