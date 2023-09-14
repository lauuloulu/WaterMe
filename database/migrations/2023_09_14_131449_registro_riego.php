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
        Schema::create('registro_riego', function (Blueprint $table) {
            $table->id('id_registro');
            $table->unsignedBigInteger('id_pp');
            $table->foreign('id_pp')->references('id_pp')->on('planta_persona');
            $table->timestamp('fecha_registro');
            $table->text('nota_registro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_riego');
    }
};
