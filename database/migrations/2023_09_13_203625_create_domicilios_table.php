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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('calle_mza');
            $table->string('nro_lote');
            $table->string('departamento')->nullable();
            $table->string('seccion')->nullable();
            $table->string('barrio');
            $table->string('localidad')->default('Santiago del estero');
            $table->string('distrito')->default('Capital');
            $table->string('provincia')->default('Santiago del Estero');
            $table->string('pais')->default('Arg');
            $table->string('estado')->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
