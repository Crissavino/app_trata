<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGformulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gformularios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numeroCarpeta');
            $table->text('introduccion');
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestamps();
        });

        Schema::create('docinternas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArchivo')->nullable();
            $table->string('path')->nullable();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('docexternas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArchivo')->nullable();
            $table->string('path')->nullable();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('notrelacionadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArchivo')->nullable();
            $table->string('path')->nullable();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('intervencionestrategias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArchivo')->nullable();
            $table->string('path')->nullable();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('infosocioambientals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreArchivo')->nullable();
            $table->string('path')->nullable();
            $table->integer('gformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('temaintervencions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('intervencions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaIntervencion');
            $table->integer('temaIntervencion_id')->unsigned();
            $table->string('temaOtro')->nullable();
            $table->string('nombreContacto')->nullable();
            $table->string('telefonoContacto')->nullable();
            $table->string('descripcionIntervencion')->nullable();
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('gformulario_intervencion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gformulario_id')->unsigned();
            $table->integer('intervencion_id')->unsigned();
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
        Schema::dropIfExists('gformularios');
        Schema::dropIfExists('docinternas');
        Schema::dropIfExists('docexternas');
        Schema::dropIfExists('notrelacionadas');
        Schema::dropIfExists('intervencionestrategias');
        Schema::dropIfExists('infosocioambientals');
        Schema::dropIfExists('temaintervencions');
        Schema::dropIfExists('intervencions');
        Schema::dropIfExists('gformulario_intervencion');
    }
}
