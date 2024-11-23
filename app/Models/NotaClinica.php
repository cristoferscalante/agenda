<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaClinica extends Model
{
    protected $table = 'nota_clinica';

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}

