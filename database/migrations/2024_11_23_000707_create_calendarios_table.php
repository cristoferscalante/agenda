<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->json('fechas_disponibles');
            $table->unsignedBigInteger('profesional_de_salud_id'); // Clave foránea
            $table->foreign('profesional_de_salud_id')
                  ->references('id')
                  ->on('profesional_de_salud')
                  ->onDelete('cascade'); // Relación con on delete cascade
            $table->timestamps();
        });              
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario');
    }
};
