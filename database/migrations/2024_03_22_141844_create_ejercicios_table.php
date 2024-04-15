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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ejercicio');
            $table->string('slug');
            $table->string('imagen');
            $table->text('explicacion');
            $table->enum('musculo', ['pierna', 'triceps', 'biceps', 'pecho', 'espalda', 'abdominales', 'hombro']);
            $table->boolean('aprobado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
