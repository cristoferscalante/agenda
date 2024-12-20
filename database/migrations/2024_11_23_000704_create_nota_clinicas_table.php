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
        Schema::create('nota_clinica', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->dateTime('fecha_hora');
            $table->foreignId('citas_id')->constrained('citas')->onDelete('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_clinica');
    }
};
