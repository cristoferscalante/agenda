<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado', ['pendiente', 'completada', 'cancelada'])->default('pendiente');
            $table->string('tipo');
            $table->string('motivo');
            $table->foreignId('pacientes_id')->constrained('pacientes')->onDelete('cascade');
            $table->foreignId('profesional_de_salud_id')->constrained('profesional_de_salud')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar restricciones antes de eliminar la tabla
            $table->dropForeign(['pacientes_id']);
            $table->dropForeign(['profesional_de_salud_id']);
        });

        Schema::dropIfExists('citas');
    }
};




