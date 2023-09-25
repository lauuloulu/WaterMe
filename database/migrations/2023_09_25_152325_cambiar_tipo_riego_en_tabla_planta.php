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
        Schema::table('planta', function (Blueprint $table) {
            $table->timestamp	('riego')->change(); // Cambia 'date' a 'datetime' si necesitas incluir la hora.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planta', function (Blueprint $table) {
            $table->decimal('riego', 8, 2)->change();
        });
    }
};
