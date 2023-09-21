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
                      $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')
            ->references('id')
            ->on('perfils')
            ->onDelete('cascade');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('tipo_muestra');
            $table->string('met_toma_mue'); /* Metodo toma muestra */ 
            $table->string('tamizaje');
            $table->string('fecha_tami'); /* Fecha Tamizaje */
            $table->string('fum');
            $table->string('menopausia');
            $table->string('metodo_anti_con'); /* Metodo Anticonceptivo */
            $table->string('cirujias_pre'); /* Cirujias Previas */
            $table->string('causa_lesion'); 
            $table->string('thr'); /* Terapia Hormonal de Reemplazo */
            $table->string('embarazo_actual');
            $table->string('trata_rad'); /* Tratamiento Radiante */
            $table->string('quimio');
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
