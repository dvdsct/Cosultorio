<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Livewire\EnfermedadActual;


class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'turno_id',
        'observaciones',
         'ea',
        'estado',
        'embarazo',
         'fum',
         'indice_mc',
         'tension_arterial',
         'temperatura'
    ];




    public function perfiles()
    {

        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function turnos()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }

    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_x_consultas');
    }
    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'consultas_x_medicos');
    }

    public function laboratorios()
    {
        return $this->belongsToMany(Laboratorio::class, 'laboratorio_x_consultas');
    }


    public function imagenes()
    {
        return $this->belongsToMany(Imagen::class, 'imagen_x_consultas');
    }
}
