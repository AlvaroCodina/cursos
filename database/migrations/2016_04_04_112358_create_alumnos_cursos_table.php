<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cursos_id')->unsigned();
            $table->foreign('cursos_id')->references('id')->on('cursos');
            $table->integer('alumnos_id')->unsigned();
            $table->foreign('alumnos_id')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alumnos_cursos');
    }
}
