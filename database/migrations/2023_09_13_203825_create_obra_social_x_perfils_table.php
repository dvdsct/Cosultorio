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
        Schema::create('obra_social_x_perfils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')
            ->references('id')
            ->on('perfils')
            ->onDelete('cascade');
            $table->unsignedBigInteger('obra_social_id')->nullable();
            $table->foreign('obra_social_id')
            ->references('id')
            ->on('obra_socials')
            ->onDelete('cascade');
            $table->string('plan')->nullable();
            $table->string('nro_afil')->nullable();
            $table->string('estado')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obra_social_x_perfils');
    }
};
