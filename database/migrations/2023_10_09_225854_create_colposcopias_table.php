<?php

use App\Models\Citologia;
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
        Schema::create('colposcopias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biopsia_id');
            $table->foreign('biopsia_id')
            ->references('id')
            ->on('biopsias')
            ->onDelete('cascade');
            $table->unsignedBigInteger('citologia_id');
            $table->foreign('citologia_id')
            ->references('id')
            ->on('citologias')
            ->onDelete('cascade');
            $table->unsignedBigInteger('hallazgo_id');
            $table->foreign('hallazgo_id')
            ->references('id')
            ->on('hallazgos')
            ->onDelete('cascade');
            $table->string('responsable');
            $table->string('establecimiento');
            $table->string('localidad');
            $table->string('test_vph');
            $table->string('observaciones');
            $table->string('evaluacion');
            $table->string('zona_trans');
            $table->string('tratamiento');
            $table->string('seguimiento');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colposcopias');
    }
};
