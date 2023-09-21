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
        Schema::create('receta_x_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')
            ->references('id')
            ->on('consultas')
            ->onDelete('cascade');
            $table->unsignedBigInteger('receta_id')->nullable();
            $table->foreign('receta_id')
            ->references('id')
            ->on('recetas')
            ->onDelete('cascade');
            $table->string('descripcion');
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
        Schema::dropIfExists('receta_x_consultas');
    }
};
