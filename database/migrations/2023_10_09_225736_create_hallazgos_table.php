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
        Schema::create('hallazgos', function (Blueprint $table) {
            $table->id();
            $table->string('normales');
            $table->string('anormales_g1');
            $table->string('anormales_g2');
            $table->string('no_especifico');
            $table->string('sospecha_inv');
            $table->string('varios');
            $table->string('biopsia');
            $table->string('ecc');
            $table->string('test_schiller');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hallazgos');
    }
};
