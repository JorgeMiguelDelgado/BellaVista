<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date("fecha");
            $table->integer("nota");
            $table->string("descripcion");
            $table->unsignedBigInteger("id_tema");
            $table->unsignedBigInteger("id_prof");
            $table->unsignedBigInteger("id_estudiante");
            $table->foreign("id_tema")->references("id")->on("themes");
            $table->foreign("id_prof")->references("id")->on("teachers");
            $table->foreign("id_estudiante")->references("id")->on("students");
            
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
        Schema::dropIfExists('activities');
    }
}
