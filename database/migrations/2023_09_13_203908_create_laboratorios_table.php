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
            $table->string('hemo')->nullable();
            $table->string('hb')->nullable();
            $table->string('hto')->nullable();
            $table->string('glucem')->nullable();
            $table->string('ptog')->nullable();
            $table->string('hb_glico')->nullable();
            $table->string('grupo')->nullable();
            $table->string('factor_rh')->nullable();
            $table->string('orina')->nullable();
            $table->string('urocult')->nullable();
            $table->string('fibrino')->nullable();
            $table->string('flujo_vag')->nullable();
            $table->string('coagulogram')->nullable();
            $table->string('tsh')->nullable();
            $table->string('fsh')->nullable();
            $table->string('lh')->nullable();
            $table->string('dhea')->nullable();
            $table->string('testost_l')->nullable();
            $table->string('testost_b')->nullable();
            $table->string('h_antimull')->nullable();
            $table->string('glucosuria')->nullable();
            $table->string('ferritina')->nullable();
            $table->string('transferri')->nullable();
            $table->string('anti_ttg')->nullable();
            $table->string('gliadina')->nullable();
            $table->string('chagas')->nullable();
            $table->string('toxo')->nullable();
            $table->string('vdrl_cual')->nullable();
            $table->string('hbs_ag')->nullable();
            $table->string('hiv')->nullable();
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
