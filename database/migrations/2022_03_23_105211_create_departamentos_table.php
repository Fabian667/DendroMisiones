<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->id();
            $table->string('Nombre');
            $table->string('CodigoPostal');
            $table->integer('IdProvinvia')->unsigned();
            $table->integer('IdZona');
            $table->timestamps();
        //  $table->foreign('IdProvinvia')->references('id')->on('provincias');
           // $table->foreign('IdZona')->references('id')->on('ZONA');






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
