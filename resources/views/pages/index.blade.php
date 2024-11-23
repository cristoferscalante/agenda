@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Citas Médicas</h1>
    <a href="{{ route('citas.create') }}" class="btn btn-primary">Nueva Cita</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Profesional</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->profesional->nombre }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ ucfirst($cita->estado) }}</td>
                <td>
                    <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
