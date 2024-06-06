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
        Schema::create('colpo_x_medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colposcopia_id');
            $table->foreign('colposcopia_id')
            ->references('id')
            ->on('colposcopias')
            ->onDelete('cascade');

            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')
            ->references('id')
            ->on('medicos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('colpo_x_medicos');
    }
};
