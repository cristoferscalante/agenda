import React, { useState } from "react";
import { useForm } from "@inertiajs/react";

const Create = () => {
    const { data, setData, post, processing, errors } = useForm({
        nombre: "",
        fecha_nacimiento: "",
        contacto: "",
        historial_medico: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/pacientes"); // Laravel maneja la ruta POST
    };

    return (
        <div>
            <h1>Crear Paciente</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Nombre:</label>
                    <input
                        type="text"
                        value={data.nombre}
                        onChange={(e) => setData("nombre", e.target.value)}
                        className={errors.nombre ? "error" : ""}
                    />
                    {errors.nombre && <p>{errors.nombre}</p>}
                </div>
                <div>
                    <label>Fecha de Nacimiento:</label>
                    <input
                        type="date"
                        value={data.fecha_nacimiento}
                        onChange={(e) => setData("fecha_nacimiento", e.target.value)}
                        className={errors.fecha_nacimiento ? "error" : ""}
                    />
                    {errors.fecha_nacimiento && <p>{errors.fecha_nacimiento}</p>}
                </div>
                <div>
                    <label>Contacto:</label>
                    <input
                        type="text"
                        value={data.contacto}
                        onChange={(e) => setData("contacto", e.target.value)}
                        className={errors.contacto ? "error" : ""}
                    />
                    {errors.contacto && <p>{errors.contacto}</p>}
                </div>
                <div>
                    <label>Historial Médico:</label>
                    <textarea
                        value={data.historial_medico}
                        onChange={(e) => setData("historial_medico", e.target.value)}
                    ></textarea>
                </div>
                <button type="submit" disabled={processing}>
                    Guardar
                </button>
            </form>
        </div>
    );
};

export default Create;
