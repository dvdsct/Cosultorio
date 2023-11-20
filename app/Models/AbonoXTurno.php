<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoXTurno extends Model
{
    use HasFactory;

    public function turnos(){

        return $this->belongsToMany(Turnos::class, 'abono_x_turnos');
    }
}
