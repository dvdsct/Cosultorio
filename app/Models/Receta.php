<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'vademecum_id'  ,
        'cie10_id' ,
        'indicacion'  ,
        'cantidad'  ,
        'estado' ,
    ];

    public function consultas(){
        return $this->belongsToMany(Consulta::class,'receta_x_consultas');
    }
    public function vademecums(){
        return $this->belongsTo(Vademecum::class,'vademecum_id');
    }

    public function ciediez(){

        return $this->belongsTo(Cie10::class, 'cie10_id');
    }

}
