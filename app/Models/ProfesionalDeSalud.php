<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesionalDeSalud extends Model
{
    protected $table = 'profesional_de_salud';

    public function pacientes()
    {
        return $this->hasMany(Cita::class);
    }

    public function disponibilidadSemanal()
    {
        return $this->hasMany(DisponibilidadSemanal::class);
    }

    public function reportes()
    {
        return $this->hasMany(ReporteMensual::class);
    }
}

