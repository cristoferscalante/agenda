<?php

namespace App\Http\Controllers;

use App\Models\ProfesionalDeSalud;
use Illuminate\Http\Request;

class ProfesionalDeSaludController extends Controller
{
    /**
     * Muestra una lista de todos los profesionales de salud.
     */
    public function index()
    {
        $profesionales = ProfesionalDeSalud::all();
        return view('profesionales.index', compact('profesionales'));
    }

    /**
     * Muestra el formulario para crear un nuevo profesional de salud.
     */
    public function create()
    {
        return view('profesionales.create');
    }

    /**
     * Almacena un nuevo profesional de salud en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:profesional_de_salud,email',
            'telefono' => 'required|string|max:20',
        ]);

        ProfesionalDeSalud::create($request->all());

        return redirect()->route('profesionales.index')->with('success', 'Profesional de salud creado con éxito.');
    }

    /**
     * Muestra los detalles de un profesional de salud específico.
     */
    public function show(ProfesionalDeSalud $profesional)
    {
        return view('profesionales.show', compact('profesional'));
    }

    /**
     * Muestra el formulario para editar un profesional de salud existente.
     */
    public function edit(ProfesionalDeSalud $profesional)
    {
        return view('profesionales.edit', compact('profesional'));
    }

    /**
     * Actualiza los datos de un profesional de salud en la base de datos.
     */
    public function update(Request $request, ProfesionalDeSalud $profesional)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|unique:profesional_de_salud,email,' . $profesional->id,
            'telefono' => 'required|string|max:20',
        ]);

        $profesional->update($request->all());

        return redirect()->route('profesionales.index')->with('success', 'Profesional de salud actualizado con éxito.');
    }

    /**
     * Elimina un profesional de salud de la base de datos.
     */
    public function destroy(ProfesionalDeSalud $profesional)
    {
        $profesional->delete();

        return redirect()->route('profesionales.index')->with('success', 'Profesional de salud eliminado con éxito.');
    }
}

