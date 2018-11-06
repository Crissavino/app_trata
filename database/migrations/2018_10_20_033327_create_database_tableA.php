<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTableA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('aformularios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('datos_nombre_referencia');
            $table->string('datos_numero_carpeta');
            $table->dateTimeTz('datos_fecha_ingreso');
            $table->integer('modalidad_id')->unsigned();
            $table->integer('presentacion_espontanea_id')->unsigned()->nullable();
            $table->integer('derivacion_otro_organismo_id')->unsigned()->nullable();
            $table->string('derivacion_otro_organismo_cual')->nullable();
            $table->integer('estadocaso_id')->unsigned();
            $table->string('datos_ente_judicial');
            $table->integer('caratulacionjudicial_id')->unsigned();
            $table->string('caratulacionjudicial_otro')->nullable();
            $table->string('datos_nro_causa');
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('caratulacionjudicials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('estadocasos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('modalidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('otrosorganismos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('presentacionespontaneas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        
        Schema::create('profesionalactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('profesionalintervinientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('profesional_id')->unsigned();
            $table->dateTimeTz('datos_profesional_interviene_desde');
            $table->dateTimeTz('datos_profesional_interviene_hasta')->nullable();
            $table->integer('profesionalactualmente_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('profesionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_apellido_equipo');
            $table->string('email');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('aformulario_profesionalinterviniente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aformulario_id')->unsigned();
            $table->integer('profesionalinterviniente_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aformularios');
        Schema::dropIfExists('caratulacionjudicials');
        Schema::dropIfExists('estadocasos');
        Schema::dropIfExists('modalidads');
        Schema::dropIfExists('otrosorganismos');
        Schema::dropIfExists('presentacionespontaneas');
        Schema::dropIfExists('profesionalactualmentes');
        Schema::dropIfExists('profesionalintervinientes');
        Schema::dropIfExists('profesionals');
        Schema::dropIfExists('aformulario_profesionalinterviniente');
    }
}
