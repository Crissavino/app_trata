<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNrocarpetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numerocarpetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            //nuevo
            $table->integer('numeroCarpeta')->unique();
            $table->integer('aformulario_id')->nullable()->unsigned();
            $table->integer('bformulario_id')->nullable()->unsigned();
            $table->integer('cformulario_id')->nullable()->unsigned();
            $table->integer('dformulario_id')->nullable()->unsigned();
            $table->integer('eformulario_id')->nullable()->unsigned();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('numerocarpetas');
    }
}
