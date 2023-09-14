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
        Schema::create('persona', function (Blueprint $table) {
        $table->id('id_persona');
        $table->string('nombre_persona');
        $table->string('apellidos');
        $table->string('correo')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('contraseña');
        $table->rememberToken();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
