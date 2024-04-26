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
            $table->unsignedBigInteger('paciente_id');

            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('turno_id');

            $table->foreign('turno_id')
                ->references('id')
                ->on('turnos')
                ->onDelete('cascade');

            $table->unsignedBigInteger('biopsia_id')->nullable();
            $table->foreign('biopsia_id')
                ->references('id')
                ->on('biopsias')
                ->onDelete('cascade');
            $table->unsignedBigInteger('citologia_id')->nullable();
            $table->foreign('citologia_id')
                ->references('id')
                ->on('citologias')
                ->onDelete('cascade');
            $table->unsignedBigInteger('hallazgo_id')->nullable();
            $table->foreign('hallazgo_id')
                ->references('id')
                ->on('hallazgos')
                ->onDelete('cascade');
            $table->string('responsable')->nullable();
            $table->string('establecimiento')->nullable();
            $table->string('localidad')->nullable();
            $table->string('test_vph')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('evaluacion')->nullable();
            $table->string('zona_trans')->nullable();
            $table->string('tratamiento')->nullable();
            $table->text('seguimiento')->nullable();
            $table->string('estado')->default('1');
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
