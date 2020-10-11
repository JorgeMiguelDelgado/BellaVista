<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->date("fecha");
            $table->integer("nota");
            $table->unsignedBigInteger("id_detalle");
            $table->unsignedBigInteger("id_tema");
            $table->unsignedBigInteger("id_estudiante");
            $table->unsignedBigInteger("id_prof");
            $table->foreign("id_detalle")->references("id")->on("details");
            $table->foreign("id_tema")->references("id")->on("themes");
            $table->foreign("id_estudiante")->references("id")->on("students");
            $table->foreign("id_prof")->references("id")->on("teachers");
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
        Schema::dropIfExists('evaluations');
    }
}
