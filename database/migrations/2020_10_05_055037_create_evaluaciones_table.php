<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->date("fecha");
            $table->integer("nota");
            $table->unsignedBigInteger("id_detalle");
            $table->unsignedBigInteger("id_tema");
            $table->unsignedBigInteger("id_estudiante");
            $table->unsignedBigInteger("id_prof");
            $table->foreign("id_detalle")->references("id")->on("detalles");
            $table->foreign("id_tema")->references("id")->on("temas");
            $table->foreign("id_estudiante")->references("id")->on("estudiantes");
            $table->foreign("id_prof")->references("id")->on("profesores");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion');
    }
}
