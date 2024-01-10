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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_laboratorio_id');
            $table->foreign('tipo_laboratorio_id')
            ->references('id')
            ->on('tipo_laboratorios')
            ->onDelete('cascade');
            $table->unsignedBigInteger('cie10_id');
            $table->foreign('cie10_id')
            ->references('id')
            ->on('cie10s')
            ->onDelete('cascade');
            $table->string('valor')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorios');
    }
};
