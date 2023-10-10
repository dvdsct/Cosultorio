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
        Schema::create('telefono_x_personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')
            ->references('id')
            ->on('personas')
            ->onDelete('cascade');
            $table->unsignedBigInteger('telefono_id');
            $table->foreign('telefono_id')
            ->references('id')
            ->on('telefonos')
            ->onDelete('cascade');
            $table->string('estado')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefono_x_personas');
    }
};
