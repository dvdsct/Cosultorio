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
        Schema::create('consultas', function (Blueprint $table) {
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
            $table->string('fum')->nullable();
            $table->string('temperatura')->nullable();
            $table->text('ea')->nullable();
            $table->string('tension_arterial')->nullable();
            $table->string('indice_mc')->nullable();
            $table->string('embarazo')->default('no');
            $table->string('edad_geatacional')->default('no');
            $table->text('observaciones')->nullable();
            $table->string('estado')->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
