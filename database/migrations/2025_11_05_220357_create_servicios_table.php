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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->enum('tipo', ['alquiler_maquinaria', 'operador', 'mantenimiento', 'transporte', 'consultoria']);
            $table->string('categoria')->nullable();
            $table->text('descripcion_corta')->nullable();
            $table->longText('descripcion_completa')->nullable();
            $table->json('caracteristicas')->nullable();
            $table->json('beneficios')->nullable();
            $table->json('incluye')->nullable();
            $table->json('no_incluye')->nullable();
            $table->json('requisitos')->nullable();
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->decimal('precio_por_hora', 10, 2)->nullable();
            $table->decimal('precio_por_dia', 10, 2)->nullable();
            $table->decimal('precio_por_semana', 10, 2)->nullable();
            $table->decimal('precio_por_mes', 10, 2)->nullable();
            $table->enum('disponibilidad', ['disponible', 'limitado', 'no_disponible'])->default('disponible');
            $table->enum('estado', ['activo', 'inactivo', 'descontinuado'])->default('activo');
            $table->json('imagenes')->nullable();
            $table->json('documentos')->nullable();
            $table->json('maquinaria_compatible')->nullable();
            $table->integer('tiempo_respuesta_horas')->nullable();
            $table->json('zonas_cobertura')->nullable();
            $table->text('notas_internas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
