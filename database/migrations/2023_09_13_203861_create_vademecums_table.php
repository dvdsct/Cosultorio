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
        Schema::create('vademecums', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('droga')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('labs')->nullable();
            $table->string('estado')->nullable();
            $table->string('codigo_de_barra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vademecums');
    }
};
