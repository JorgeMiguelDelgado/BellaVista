<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_contenido");
            $table->unsignedBigInteger("id_materia");
            $table->unsignedBigInteger("id_unidad");
            $table->foreign("id_contenido")->references("id")->on("contents");
            $table->foreign("id_materia")->references("id")->on("subjects");
            $table->foreign("id_unidad")->references("id")->on("units");
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
        Schema::dropIfExists('themes');
    }
}
