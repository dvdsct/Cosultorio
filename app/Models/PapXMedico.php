<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PapXMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'pap_id',
        'medico_id'
    ];
}
