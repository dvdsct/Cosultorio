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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hemo');
            $table->string('hb');
            $table->string('hto') ;
            $table->string('glucem') ;
            $table->string('ptog') ;
            $table->string('hb_glico') ;
            $table->string('grupo') ;
            $table->string('factor_rh') ;
            $table->string('orina') ;
            $table->string('urocult') ;
            $table->string('fibrino') ;
            $table->string('flujo_vag') ;
            $table->string('coagulogram') ;
            $table->string('tsh') ;
            $table->string('fsh') ;
            $table->string('lh') ;
            $table->string('dhea') ;
            $table->string('testost_l') ;
            $table->string('testost_b') ;
            $table->string('h_antimull') ;
            $table->string('glucosauria') ;
            $table->string('ferritina') ;
            $table->string('transferri') ;
            $table->string('anti_ttg') ;
            $table->string('gliadina') ;
            $table->string('chagas') ;
            $table->string('toxo') ;
            $table->string('vdrl_cual') ;
            $table->string('hbs_ag') ;
            $table->string('hiv') ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorios');
    }
};
