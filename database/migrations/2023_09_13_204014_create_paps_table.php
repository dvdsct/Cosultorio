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
        Schema::create('paps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('turno_id');

            $table->foreign('turno_id')
                ->references('id')
                ->on('turnos')
                ->onDelete('cascade');
            $table->string('estado')->default('1');
            $table->string('tipo_muestra')->nullable();
            $table->string('met_toma_mue')->nullable(); /* Metodo toma muestra */
            $table->string('res_vph')->nullable();
            $table->string('fecha_tami')->nullable(); /* Fecha Tamizaje */
            $table->string('fum')->nullable();
            $table->string('menopausia')->nullable();
            $table->string('metodo_anti_con')->nullable(); /* Metodo Anticonceptivo */
            $table->string('otros_anti_con')->nullable(); // Otros metodos anticonceptivos
            $table->string('cirujias_pre')->nullable(); /* Cirujias Previas */
            $table->string('causa_lesion')->nullable();
            $table->string('thr')->nullable(); /* Terapia Hormonal de Reemplazo */
            $table->string('embarazo_actual')->nullable();
            $table->string('trata_rad')->nullable(); /* Tratamiento Radiante */
            $table->string('quimio')->nullable();
            $table->string('fecha_pp')->nullable();
            $table->unsignedBigInteger('pap_previo_id')->nullable();
            $table->foreign('pap_previo_id')
            ->references('id')
            ->on('pap_previos')
            ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paps');
    }
};
