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
        Schema::create('vademecum_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vademecum_id');
            $table->foreign('vademecum_id')
            ->references('id')
            ->on('vademecums')
            ->onDelete('cascade');

            $table->string('unidades');
            $table->string('precio');
            $table->string('unitario');
            $table->string('fecha');
            $table->string('laboratorio');
            $table->string('anulado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vademecum_detalles');
    }
};
