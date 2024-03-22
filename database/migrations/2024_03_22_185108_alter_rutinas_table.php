<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rutinas', function (Blueprint $table) {
            $table->unsignedBigInteger('valoracion_id');
            $table->foreign('valoracion_id')->references('id')->on('valoraciones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rutinas', function (Blueprint $table) {
            // Eliminar las restricciones de clave externa
            $table->dropForeign(['valoracion_id']);
            // Eliminar las columnas añadidas
            $table->dropColumn('valoracion_id');
        });
    }
};