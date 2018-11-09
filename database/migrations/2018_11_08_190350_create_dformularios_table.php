<?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// class CreateDformulariosTable extends Migration
// {
    /**
     * Run the migrations.
     *
     // * @return void
     */
    // public function up()
    // {
    //     Schema::create('dformularios', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->integer('calificaciongenerals_id')->unsigned()
    //         $table->string('calificaciongeneral_otra')->nullable()
    //         $table->integer('calificacionespecificas_id')->unsigned()
    //         $table->integer('finalidads_id')->unsigned()
    //         $table->string('finalidad_otra')->nullable()
    //         $table->integer('actividads_id')->unsigned()
    //         $table->string('actividad_otra')->nullable()
    //         $table->integer('privados_id')->unsigned()->nullable()
    //         $table->string('privado_otra')->nullable()
    //         $table->integer('textils_id')->unsigned()->nullable()
    //         $table->string('textil_otra')->nullable()->nullable()
    //         $table->integer('rurals_id')->unsigned()->nullable()
    //         $table->string('rural_otra')->nullable()->nullable()
    //         $table->string('domicilioVenta')->nullable()
    //         $table->integer('contactoexplotacions_id')->unsigned()
    //         $table->string('contactoexplotacion_otro')->nullable()
    //         $table->integer('viajos_id')->unsigned()
    //         $table->integer('acompanados_id')->unsigned()->nullable()
    //         $table->integer('acompanadoreds_id')->unsigned()->nullable()
    //         $table->string('domicilio')
    //         $table->integer('residelugars_id')->unsigned()
    //         $table->integer('enganos_id')->unsigned()
    //         $table->integer('haypersonas_id')->unsigned()
    //         $table->integer('tipovictimas_id')->unsigned()
    //         $table->string('tareas')
    //         $table->string('horasTarea')
    //         $table->integer('frecuenciapagos_id')->unsigned()
    //         $table->integer('modalidadpagos_id')->unsigned()
    //         $table->integer('especiaconceptos_id')->unsigned()->nullable()
    //         $table->string('especiaconceptos_otro')->nullable()
    //         $table->integer('montoPago')
    //         $table->integer('deudas_id')->unsigned()
    //         $table->integer('motivodeudas_id')->unsigned()->nullable()
    //         $table->integer('lugardeudas_id')->unsigned()->nullable()
    //         $table->integer('permanencias_id')->unsigned()
    //         $table->integer('testigos_id')->unsigned()
    //         $table->string('coordinadorPTN')->nullable()
    //         $table->string('coordinadorPTN_otro')->nullable()
    //         $table->integer('haycorrientes_id')->unsigned()
    //         $table->integer('haygas_id')->unsigned()
    //         $table->integer('haymedidas_id')->unsigned()
    //         $table->string('haymedidas_otro')->nullable()
    //         $table->integer('hayhacinamientos_id')->unsigned()
    //         $table->integer('hayaguas_id')->unsigned()
    //         $table->integer('haybanos_id')->unsigned()
    //         $table->integer('cuantosbanos_id')->unsigned()
    //         $table->integer('materials_id')->unsigned()
    //         $table->string('material_otro')->nullable()
    //         $table->integer('elementotrabajos_id')->unsigned()
    //         $table->integer('elementoseguridads_id')->unsigned()
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('calificaciongenerals', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('calificacionespecificas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('finalidads', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('actividads', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('privados', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('textils', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('rurals', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('contactoexplotacions', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('viajos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('acompanados', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('acompanadoreds', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('residelugars', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('enganos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('haypersonas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('tipovictimas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('frecuenciapagos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('modalidadpagos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('especiaconceptos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('deudas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('motivodeudas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('lugardeudas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('permanencias', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('testigos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('haycorrientes', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('haygas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('haymedidas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('hayhacinamientos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('hayaguas', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('haybanos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('cuantosbanos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('materials', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('elementotrabajos', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });

    //     Schema::create('elementoseguridads', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->string('nombre');
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });
    // }

    // *
    //  * Reverse the migrations.
    //  *
     // * @return void
     
//     public function down()
//     {
//         Schema::dropIfExists('dformularios');
//         Schema::dropIfExists('calificaciongenerals');
//         Schema::dropIfExists('calificacionespecificas');
//         Schema::dropIfExists('finalidads');
//         Schema::dropIfExists('actividads');
//         Schema::dropIfExists('privados');
//         Schema::dropIfExists('textils');
//         Schema::dropIfExists('rurals');
//         Schema::dropIfExists('contactoexplotacions');
//         Schema::dropIfExists('viajos');
//         Schema::dropIfExists('acompanados');
//         Schema::dropIfExists('acompanadoreds');
//         Schema::dropIfExists('residelugars');
//         Schema::dropIfExists('enganos');
//         Schema::dropIfExists('haypersonas');
//         Schema::dropIfExists('tipovictimas');
//         Schema::dropIfExists('frecuenciapagos');
//         Schema::dropIfExists('modalidadpagos');
//         Schema::dropIfExists('especias');
//         Schema::dropIfExists('especiaconceptos');
//         Schema::dropIfExists('deudas');
//         Schema::dropIfExists('motivodeudas');
//         Schema::dropIfExists('lugardeudas');
//         Schema::dropIfExists('permanencias');
//         Schema::dropIfExists('testigos');
//         Schema::dropIfExists('haycorrientes');
//         Schema::dropIfExists('haygas');
//         Schema::dropIfExists('haymedidas');
//         Schema::dropIfExists('hayhacinamientos');
//         Schema::dropIfExists('hayaguas');
//         Schema::dropIfExists('haybanos');
//         Schema::dropIfExists('cuantosbanos');
//         Schema::dropIfExists('materials');
//         Schema::dropIfExists('elementotrabajos');
//         Schema::dropIfExists('elementoseguridads');
//     }
// }
