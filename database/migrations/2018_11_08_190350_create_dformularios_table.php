<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDformulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dformularios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('calificaciongeneral_id')->unsigned();
            $table->string('calificaciongeneral_otra')->nullable();
            $table->integer('calificacionespecifica_id')->unsigned();
            $table->integer('finalidad_id')->unsigned();
            $table->string('finalidad_otra')->nullable();
            $table->integer('actividad_id')->unsigned();
            $table->string('actividad_otra')->nullable();
            $table->string('privado_otra')->nullable();
            $table->string('marcaTextil')->nullable();
            $table->string('textil_otra')->nullable()->nullable();
            $table->string('rural_otra')->nullable()->nullable();
            $table->string('domicilioVenta')->nullable();
            $table->integer('contactoexplotacion_id')->unsigned();
            $table->string('contactoexplotacion_otro')->nullable();
            $table->integer('viajo_id')->unsigned();
            $table->integer('acompanado_id')->unsigned()->nullable();
            $table->integer('acompanadored_id')->unsigned()->nullable();
            $table->string('domicilio');
            $table->integer('residelugar_id')->unsigned();
            $table->integer('engano_id')->unsigned();
            $table->integer('haypersona_id')->unsigned();
            $table->integer('tipovictima_id')->unsigned();
            $table->string('tarea');
            $table->string('horasTarea');
            $table->integer('frecuenciapago_id')->unsigned();
            $table->integer('modalidadpagos_id')->unsigned();
            $table->string('especiaconceptos_otro')->nullable();
            $table->string('montoPago');
            $table->integer('deuda_id')->unsigned();
            $table->string('motivodeuda_otro')->nullable();
            $table->integer('lugardeuda_id')->unsigned()->nullable();
            $table->integer('permanencia_id')->unsigned();
            $table->integer('testigo_id')->unsigned();
            $table->string('coordinadorPTN')->nullable();
            $table->string('coordinadorPTN_otro')->nullable();
            $table->integer('haycorriente_id')->unsigned();
            $table->integer('haygas_id')->unsigned();
            $table->string('haymedidas_otro')->nullable();
            $table->integer('hayhacinamiento_id')->unsigned();
            $table->integer('hayagua_id')->unsigned();
            $table->integer('haybano_id')->unsigned();
            $table->integer('cuantosbano_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->string('material_otro')->nullable();
            $table->integer('elementotrabajo_id')->unsigned();
            $table->integer('elementoseguridad_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('calificaciongenerals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('calificacionespecificas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('finalidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('actividads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('privados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('textils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('rurals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('contactoexplotacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('viajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('acompanados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('acompanadoreds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('residelugars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('enganos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('haypersonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipovictimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('frecuenciapagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('modalidadpagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('especiaconceptos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('deudas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('motivodeudas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lugardeudas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('permanencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('testigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('haycorrientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('haygas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('haymedidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('hayhacinamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('hayaguas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('haybanos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cuantosbanos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('elementotrabajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('elementoseguridads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_privado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('privado_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_textil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('textil_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_rural', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('rural_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_especiaconcepto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('especiaconcepto_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_motivodeuda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('motivodeuda_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dformulario_haymedida', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dformulario_id')->unsigned();
            $table->integer('haymedida_id')->unsigned();
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
        Schema::dropIfExists('dformularios');
        Schema::dropIfExists('calificaciongenerals');
        Schema::dropIfExists('calificacionespecificas');
        Schema::dropIfExists('finalidads');
        Schema::dropIfExists('actividads');
        Schema::dropIfExists('privados');
        Schema::dropIfExists('textils');
        Schema::dropIfExists('rurals');
        Schema::dropIfExists('contactoexplotacions');
        Schema::dropIfExists('viajos');
        Schema::dropIfExists('acompanados');
        Schema::dropIfExists('acompanadoreds');
        Schema::dropIfExists('residelugars');
        Schema::dropIfExists('enganos');
        Schema::dropIfExists('haypersonas');
        Schema::dropIfExists('tipovictimas');
        Schema::dropIfExists('frecuenciapagos');
        Schema::dropIfExists('modalidadpagos');
        Schema::dropIfExists('especiaconceptos');
        Schema::dropIfExists('deudas');
        Schema::dropIfExists('motivodeudas');
        Schema::dropIfExists('lugardeudas');
        Schema::dropIfExists('permanencias');
        Schema::dropIfExists('testigos');
        Schema::dropIfExists('haycorrientes');
        Schema::dropIfExists('haygas');
        Schema::dropIfExists('haymedidas');
        Schema::dropIfExists('hayhacinamientos');
        Schema::dropIfExists('hayaguas');
        Schema::dropIfExists('haybanos');
        Schema::dropIfExists('cuantosbanos');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('elementotrabajos');
        Schema::dropIfExists('elementoseguridads');
        Schema::dropIfExists('dformulario_privado');
        Schema::dropIfExists('dformulario_textil');
        Schema::dropIfExists('dformulario_rural');
        Schema::dropIfExists('dformulario_especiaconcepto');
        Schema::dropIfExists('dformulario_motivodeuda');
        Schema::dropIfExists('dformulario_haymedida');
    }
}
