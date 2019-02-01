<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarnacimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugarnacimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bformulario_id')->unsigned();
            $table->string('paisNacimiento')->nullable();
            $table->string('provinciaNacimiento')->nullable();
            $table->string('ciudadNacimiento')->nullable();
            $table->softDeletesTz();
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
        Schema::dropIfExists('lugarnacimientos');
    }
}
