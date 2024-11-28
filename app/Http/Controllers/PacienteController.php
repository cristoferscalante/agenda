<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Mostrar la lista de pacientes.
     */
    public function index()
    {
        $pacientes = Paciente::all();

        // Pasamos los datos a la vista de Inertia
        return inertia('Pacientes/Index', [
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Mostrar el formulario para crear un paciente.
     */
    public function create()
    {
        // Renderiza el componente de React para crear un paciente
        return inertia('Pacientes/Create');
    }

    /**
     * Guardar un nuevo paciente.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'contacto' => 'required|string|max:255',
            'historial_medico' => 'nullable|string',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado con éxito.');
    }
}
