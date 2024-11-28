import React from "react";
import { Link } from "@inertiajs/react";

const Index = ({ pacientes }) => {
    return (
        <div>
            <h1>Lista de Pacientes</h1>
            <Link href="/pacientes/create" className="btn btn-primary">
                Crear Paciente
            </Link>
            <table className="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    {pacientes.map((paciente) => (
                        <tr key={paciente.id}>
                            <td>{paciente.nombre}</td>
                            <td>{paciente.fecha_nacimiento}</td>
                            <td>{paciente.contacto}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Index;
