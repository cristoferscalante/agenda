import React from 'react';
import { Link } from '@inertiajs/react';

const Index = ({ citas }) => {
    return (
        <div>
            <h1>Gestión de Citas</h1>
            <Link href="/citas/create" className="btn btn-primary mb-3">
                Crear Nueva Cita
            </Link>
            <table className="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Profesional</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    {citas.map((cita) => (
                        <tr key={cita.id}>
                            <td>{cita.id}</td>
                            <td>{cita.fecha}</td>
                            <td>{cita.hora}</td>
                            <td>{cita.pacientes.nombre}</td>
                            <td>{cita.profesional.nombre}</td>
                            <td>{cita.estado}</td>
                            <td>{cita.tipo}</td>
                            <td>{cita.motivo}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Index;
