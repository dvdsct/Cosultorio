<?php

use App\Models\cie10;
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
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_imagen_id');
            $table->foreign('tipo_imagen_id')
            ->references('id')
            ->on('tipo_imagens')
            ->onDelete('cascade');
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')
            ->references('id')
            ->on('consultas')
            ->onDelete('cascade');
            $table->unsignedBigInteger('cie10_id');
            $table->foreign('cie10_id')
            ->references('id')
            ->on('cie10s')
            ->onDelete('cascade');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagens');
    }
};
