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
        Schema::create('biopsias', function (Blueprint $table) {
            $table->id();
            $table->string('negativo');
            $table->string('cin_1');
            $table->string('cin_2');
            $table->string('cin_3');
            $table->string('cis');
            $table->string('ca_invasor');
            $table->string('adenocis');
            $table->string('ac_invasor');
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
        Schema::dropIfExists('biopsias');
    }
};
