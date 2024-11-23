<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'tipo',
        'motivo',
        'pacientes_id', // Cambiado de pacientes_id a paciente_id
        'profesional_de_salud_id', // Cambiado de profesional_de_salud_id a profesional_id
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'pacientes_id');
    }

    // Relación con el modelo ProfesionalDeSalud
    public function profesional()
    {
        return $this->belongsTo(ProfesionalDeSalud::class, 'profesional_de_salud_id');
    }
}


