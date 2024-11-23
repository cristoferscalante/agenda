<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\ProfesionalDeSalud;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['pacientes', 'profesional'])->get();
        return Inertia::render('Citas/Index', ['citas' => $citas]);
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $profesionales = ProfesionalDeSalud::all();
        return Inertia::render('Citas/Create', [
            'pacientes' => $pacientes,
            'profesionales' => $profesionales,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'tipo' => 'required|string',
            'motivo' => 'required|string',
            'paciente_id' => 'required|exists:pacientes,id',
            'profesional_id' => 'required|exists:profesional_de_salud,id',
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada con éxito.');
    }
}
