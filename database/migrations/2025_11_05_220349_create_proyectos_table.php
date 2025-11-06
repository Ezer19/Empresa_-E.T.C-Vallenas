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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->enum('tipo', ['construccion', 'mineria', 'infraestructura', 'demolicion', 'otro']);
            $table->text('descripcion')->nullable();
            $table->string('cliente');
            $table->string('contacto_cliente')->nullable();
            $table->string('email_cliente')->nullable();
            $table->string('telefono_cliente')->nullable();
            $table->string('ubicacion');
            $table->text('direccion')->nullable();
            $table->json('coordenadas')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->date('fecha_estimada_fin')->nullable();
            $table->integer('duracion_dias')->nullable();
            $table->enum('estado', ['planificacion', 'iniciado', 'en_progreso', 'pausado', 'completado', 'cancelado'])->default('planificacion');
            $table->decimal('presupuesto', 15, 2)->nullable();
            $table->decimal('costo_real', 15, 2)->nullable();
            $table->integer('progreso')->default(0);
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->json('maquinaria_asignada')->nullable();
            $table->json('servicios_incluidos')->nullable();
            $table->json('documentos')->nullable();
            $table->json('imagenes')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
