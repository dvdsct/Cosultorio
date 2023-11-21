<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;


    public function turnos(){

        return $this->belongsToMany(Turno::class,'abono_x_turnos');
    }
}
