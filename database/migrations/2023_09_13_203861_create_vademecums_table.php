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
            $table->string('nombre');
            $table->string('droga');
            $table->string('cantidad');
            $table->string('presentacion');
            $table->string('labs');
            $table->string('estado');
            $table->string('codigo_de_barra');
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
