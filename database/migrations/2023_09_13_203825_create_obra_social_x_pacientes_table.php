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
        Schema::create('obra_social_x_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
            ->references('id')
            ->on('pacientes')
            ->onDelete('cascade');
            $table->unsignedBigInteger('obra_social_id')->nullable();
            $table->foreign('obra_social_id')
            ->references('id')
            ->on('obra_socials')
            ->onDelete('cascade');
            $table->string('plan')->nullable();
            $table->string('nro_afil')->nullable();
            $table->string('estado')->nullable()->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obra_social_x_pacientes');
    }
};
