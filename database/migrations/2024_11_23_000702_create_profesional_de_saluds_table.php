<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profesional_de_salud', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('especialidad');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Asegurarte de que las tablas dependientes se eliminen primero
        Schema::dropIfExists('citas'); // Elimina citas primero
        Schema::dropIfExists('profesional_de_salud'); // Ahora elimina la tabla profesional_de_salud
    }
};



