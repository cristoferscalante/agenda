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
        Schema::create('reportes_mensuales', function (Blueprint $table) {
            $table->id();
            $table->integer('mes');
            $table->integer('año');
            $table->integer('total_citas');
            $table->integer('citas_realizadas');
            $table->integer('citas_pendientes');
            $table->foreignId('profesional_de_salud_id')->constrained('profesional_de_salud')->onDelete('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_mensuales');
    }
};
