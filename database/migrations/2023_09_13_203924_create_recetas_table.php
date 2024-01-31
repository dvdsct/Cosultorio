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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vademecum_id');
            $table->foreign('vademecum_id')
            ->references('id')
            ->on('vademecums')
            ->onDelete('cascade');
            $table->unsignedBigInteger('cie10_id');
            $table->foreign('cie10_id')
            ->references('id')
            ->on('cie10s')
            ->onDelete('cascade');
            $table->string('indicacion');
            $table->string('cantidad');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
