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
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')
            ->references('id')
            ->on('perfils')
            ->onDelete('cascade');
            $table->dateTime('fecha_consulta');
            $table->string('fum')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('ea')->nullable();
            $table->string('tension_arterial')->nullable();
            $table->string('indice_mc')->nullable();
            $table->string('embarazo')->default('no');
            $table->string('edad_geatacional')->default('no');
            $table->string('estado');
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
