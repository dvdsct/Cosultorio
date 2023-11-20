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
        Schema::create('abono_x_turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turno_id');
            $table->foreign('turno_id')
            ->references('id')
            ->on('turnos')
            ->onDelete('cascade');
            $table->unsignedBigInteger('abono_id');
            $table->foreign('abono_id')
            ->references('id')
            ->on('abonos')
            ->onDelete('cascade');
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abono_x_turnos');
    }
};
