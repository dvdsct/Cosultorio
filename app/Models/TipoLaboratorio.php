<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLaboratorio extends Model
{
    use HasFactory;

    public function laboratorios(){

        return $this->hasMany(Laboratorio::class);
    }
}
