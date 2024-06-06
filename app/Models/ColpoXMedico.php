<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColpoXMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'colposcopia_id',
        'medico_id'
    ];
}
