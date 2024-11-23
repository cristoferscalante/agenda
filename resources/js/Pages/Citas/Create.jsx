import React, { useState } from 'react';
import { useForm, Link } from '@inertiajs/react';

const Create = ({ pacientes, profesionales }) => {
    const { data, setData, post, errors } = useForm({
        fecha: '',
        hora: '',
        estado: 'pendiente',
        tipo: '',
        motivo: '',
        paciente_id: '',
        profesional_id: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/citas');
    };

    return (
        <div>
            <h1>Crear Nueva Cita</h1>
            <form onSubmit={handleSubmit}>
                <div className="form-group mb-3">
                    <label htmlFor="fecha">Fecha</label>
                    <input
                        type="date"
                        id="fecha"
                        value={data.fecha}
                        onChange={(e) => setData('fecha', e.target.value)}
                        className="form-control"
                    />
                    {errors.fecha && <div className="text-danger">{errors.fecha}</div>}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="hora">Hora</label>
                    <input
                        type="time"
                        id="hora"
                        value={data.hora}
                        onChange={(e) => setData('hora', e.target.value)}
                        className="form-control"
                    />
                    {errors.hora && <div className="text-danger">{errors.hora}</div>}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="estado">Estado</label>
                    <select
                        id="estado"
                        value={data.estado}
                        onChange={(e) => setData('estado', e.target.value)}
                        className="form-control"
                    >
                        <option value="pendiente">Pendiente</option>
                        <option value="completada">Completada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                    {errors.estado && <div className="text-danger">{errors.estado}</div>}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="tipo">Tipo</label>
                    <input
                        type="text"
                        id="tipo"
                        value={data.tipo}
                        onChange={(e) => setData('tipo', e.target.value)}
                        className="form-control"
                    />
                    {errors.tipo && <div className="text-danger">{errors.tipo}</div>}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="motivo">Motivo</label>
                    <textarea
                        id="motivo"
                        value={data.motivo}
                        onChange={(e) => setData('motivo', e.target.value)}
                        rows="3"
                        className="form-control"
                    ></textarea>
                    {errors.motivo && <div className="text-danger">{errors.motivo}</div>}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="paciente_id">Paciente</label>
                    <select
                        id="paciente_id"
                        value={data.paciente_id}
                        onChange={(e) => setData('paciente_id', e.target.value)}
                        className="form-control"
                    >
                        <option value="">Seleccione un paciente</option>
                        {pacientes.map((paciente) => (
                            <option key={paciente.id} value={paciente.id}>
                                {paciente.nombre}
                            </option>
                        ))}
                    </select>
                    {errors.paciente_id && (
                        <div className="text-danger">{errors.paciente_id}</div>
                    )}
                </div>

                <div className="form-group mb-3">
                    <label htmlFor="profesional_id">Profesional</label>
                    <select
                        id="profesional_id"
                        value={data.profesional_id}
                        onChange={(e) => setData('profesional_id', e.target.value)}
                        className="form-control"
                    >
                        <option value="">Seleccione un profesional</option>
                        {profesionales.map((profesional) => (
                            <option key={profesional.id} value={profesional.id}>
                                {profesional.nombre}
                            </option>
                        ))}
                    </select>
                    {errors.profesional_id && (
                        <div className="text-danger">{errors.profesional_id}</div>
                    )}
                </div>

                <button type="submit" className="btn btn-primary">
                    Guardar
                </button>
                <Link href="/citas" className="btn btn-secondary ml-2">
                    Cancelar
                </Link>
            </form>
        </div>
    );
};

export default Create;
