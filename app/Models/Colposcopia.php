<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colposcopia extends Model
{
    use HasFactory;

    protected $fillable = ['perfil_id',
    'turno_id'];


    public function turnos(){
        return $this->belongsTo(Turno::class, 'id');
    }
}
