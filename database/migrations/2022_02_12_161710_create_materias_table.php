<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("sigla");
            $table->integer("semestre")->nullable();
            $table->bigInteger("materia_id")->unsigned()->nullable();
            $table->text("descipcion")->nullable();
            // N materias : 1 carrera
            $table->bigInteger("carrera_id")->unsigned();
            $table->foreign("carrera_id")->references("id")->on("carreras");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
};