<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
    use HasFactory;

    public function turnos(){
        return $this->belongsTo(Turnos::class);
    }
}
