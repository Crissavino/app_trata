<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMapaCalorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mapacalors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_carpeta')->unsigned();
            $table->enum('localidad', ['nacimiento', 'captacion', 'explotacion']);
            $table->float('lat');
            $table->float('long');
            $table->bigInteger('bformulario_id')->nullable()->unsigned();
            $table->bigInteger('dformulario_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bformulario_id')->references('id')->on('bformularios');
            $table->foreign('dformulario_id')->references('id')->on('dformularios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapaCalor', function (Blueprint $table) {
            // Schema::drop('flights');

        });
    }
}
