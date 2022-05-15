<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table)
         {
            $table->increments('id');
            $table->string('Apellido');
            $table->string('Nombre');
            $table->string('DNI');
            $table->DateTime('FechaNacimiento');
            $table->string('Direccion');
            $table->string('Mail');
            $table->string('Telefono');
            $table->string('Descripcion');
            $table->integer('IdLocalidad');
            $table->integer('IdRol');
            $table->integer('IdInstitucion');
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
        Schema::dropIfExists('especies');
    }
}
