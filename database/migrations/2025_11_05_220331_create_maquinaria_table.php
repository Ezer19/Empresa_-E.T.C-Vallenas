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
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->enum('tipo', ['excavadora', 'bulldozer', 'cargador', 'grua', 'compactador', 'camion', 'otro']);
            $table->string('marca');
            $table->string('modelo');
            $table->year('año');
            $table->string('numero_serie')->unique();
            $table->text('descripcion')->nullable();
            $table->json('especificaciones')->nullable();
            $table->string('capacidad')->nullable();
            $table->decimal('peso', 10, 2)->nullable();
            $table->json('dimensiones')->nullable();
            $table->enum('combustible', ['diesel', 'gasolina', 'electrico', 'hibrido'])->default('diesel');
            $table->decimal('consumo_promedio', 8, 2)->nullable();
            $table->enum('estado', ['excelente', 'bueno', 'regular', 'mantenimiento', 'reparacion'])->default('bueno');
            $table->enum('disponibilidad', ['disponible', 'alquilado', 'mantenimiento', 'fuera_servicio'])->default('disponible');
            $table->decimal('tarifa_hora', 10, 2)->nullable();
            $table->decimal('tarifa_dia', 10, 2)->nullable();
            $table->decimal('tarifa_semana', 10, 2)->nullable();
            $table->decimal('tarifa_mes', 10, 2)->nullable();
            $table->string('ubicacion_actual')->nullable();
            $table->json('imagenes')->nullable();
            $table->json('documentos')->nullable();
            $table->json('mantenimientos')->nullable();
            $table->json('certificaciones')->nullable();
            $table->unsignedBigInteger('operador_asignado')->nullable();
            $table->timestamps();

            $table->foreign('operador_asignado')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinaria');
    }
};
