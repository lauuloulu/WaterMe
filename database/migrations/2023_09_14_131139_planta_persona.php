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
        Schema::create('planta_persona', function (Blueprint $table) {
            $table->unsignedBigInteger('id_planta');
            $table->foreign('id_planta')->references('id_planta')->on('planta')->onDelete('cascade');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('persona')->onDelete('cascade');
            $table->id('id_pp');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planta_persona');
    }
};
