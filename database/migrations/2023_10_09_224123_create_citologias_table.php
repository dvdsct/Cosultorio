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
        Schema::create('citologias', function (Blueprint $table) {
            $table->id();
            $table->string('asc-us');
            $table->string('l_sil');
            $table->string('asc_h');
            $table->string('hsil');
            $table->string('ca');
            $table->string('otros');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citologias');
    }
};
