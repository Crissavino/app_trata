<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCformulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cformularios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('otraspersonas_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('numeroCarpeta');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('otraspersonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('vinculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('referentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_apellido');
            //a edad lo debo guardar como un string porque tengo que ver la posibilidad que se desconozca el valor y tomo el Se Desconoce
            $table->string('edad');
            $table->integer('vinculo_id')->unsigned();
            $table->string('vinculo_otro')->nullable();
            $table->string('referenteContacto');
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cformulario_referente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('referente_id')->unsigned();
            $table->integer('cformulario_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('cformularios');
        Schema::dropIfExists('otraspersonas');
        Schema::dropIfExists('vinculos');
        Schema::dropIfExists('referentes');
        Schema::dropIfExists('cformulario_referente');
    }
}
