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
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('eco_gin')->nullable();
            $table->string('eco_obs')->nullable();
            $table->string('eco_abd')->nullable();
            $table->string('eco_tiro')->nullable();
            $table->string('rmn_pelv')->nullable();
            $table->string('tac_abd')->nullable();
            $table->string('tac_pel')->nullable();
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
