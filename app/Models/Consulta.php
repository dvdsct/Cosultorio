<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['perfil_id',
    'turno_id'
];



    public function perfiles (){

        return $this->belongsTo(Perfil::class,'perfil_id');
    }

    public function turnos(){
        return $this->belongsTo(Turno::class,'id');
    }

    public function recetas(){
        return $this->belongsToMany(Receta::class,'receta_x_consultas');
    }

}
