<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_contenido");
            $table->unsignedBigInteger("id_materia");
            $table->unsignedBigInteger("id_unidad");
            $table->foreign("id_contenido")->references("id")->on("contenidos");
            $table->foreign("id_materia")->references("id")->on("materias");
            $table->foreign("id_unidad")->references("id")->on("unidades");
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
        Schema::dropIfExists('temas');
    }
}
