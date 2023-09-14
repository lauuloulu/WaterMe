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
        Schema::create('planta', function (Blueprint $table) {
            $table->id('id_planta');
            $table->unsignedBigInteger('id_tipo');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_planta');
            $table->enum('estado', ['Seca','Sana','Floreciendo','Brotando','Con manchas','Pocha','Muerta']);
            $table->string('nombre_planta');
            $table->string('cantidad_agua');
            $table->decimal('riego');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planta');
    }
};
