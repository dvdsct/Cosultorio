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
            $table->string('negativo')->nullable;
            $table->string('cin_1')->nullable;
            $table->string('cin_2')->nullable;
            $table->string('cin_3')->nullable;
            $table->string('cis')->nullable;
            $table->string('ca_invasor')->nullable;
            $table->string('adenocis')->nullable;
            $table->string('ac_invasor')->nullable;
            $table->string('otros')->nullable;
            $table->string('estado')->nullable;
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
