<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTableB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('argciudads', function (Blueprint $table) {
            $table->bigIncrements('id');    
            $table->string('ciudad_nombre');
            $table->integer('provincia_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('argprovincias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provincia_nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('bajoefectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('bformularios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('victima_nombre_y_apellido');
            $table->string('victima_nombre_y_apellido_desconoce')->nullable();
            $table->string('victima_apodo');
            $table->string('victima_apodo_desconoce')->nullable();
            $table->integer('genero_id')->unsigned();
            $table->string('victima_genero_otro')->nullable();
            $table->integer('tienedoc_id')->unsigned();
            $table->integer('tipodocumento_id')->unsigned();
            $table->integer('residenciaprecaria_id')->unsigned()->nullable();
            $table->string('victima_tipo_documento_otro')->nullable();
            $table->string('victima_documento');
            $table->integer('pais_id')->unsigned();
            $table->integer('argprovincia_id')->unsigned()->nullable();
            $table->integer('localidadAR_id')->unsigned()->nullable();
            $table->integer('brestado_id')->unsigned()->nullable();
            $table->integer('urprovincia_id')->unsigned()->nullable();
            $table->integer('chprovincia_id')->unsigned()->nullable();
            $table->dateTime('victima_fecha_nacimiento');
            $table->string('victima_fecha_nacimiento_desconoce')->nullable();
            $table->string('victima_edad');
            $table->string('victima_edad_desconoce')->nullable();
            $table->integer('franjaetaria_id')->unsigned();
            $table->integer('embarazorelevamiento_id')->unsigned();
            $table->integer('embarazoprevio_id')->unsigned();
            $table->integer('hijosembarazo_id')->unsigned();
            $table->integer('bajoefecto_id')->unsigned();
            $table->integer('tienelesion_id')->unsigned();
            $table->string('victima_lesion')->nullable();
            $table->integer('lesionconstatada_id')->unsigned()->nullable();
            $table->string('victima_lesion_organismo')->nullable();
            $table->integer('enfermedadcronica_id')->unsigned();
            $table->string('victima_tipo_enfermedad_cronica')->nullable();
            $table->string('victima_limitacion_otra')->nullable();
            $table->integer('niveleducativo_id')->unsigned();
            $table->integer('oficio_id')->unsigned();
            $table->string('victima_oficio_cual')->nullable();
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('brestados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_estado');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('chprovincias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provincia_nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('discapacidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('embarazoprevios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('embarazorelevamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('enfermedadcronicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('franjaetarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('generos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('hijosembarazos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('lesionconstatadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('limitacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('niveleducativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('oficios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('paises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('residenciaprecarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('tienedocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('tienelesions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
         
        Schema::create('tipodocumentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('urprovincias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provincia_nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('bformulario_discapacidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bformulario_id')->unsigned();
            $table->integer('discapacidad_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });
        
        Schema::create('bformulario_limitacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bformulario_id')->unsigned();
            $table->integer('limitacion_id')->unsigned();
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
        Schema::dropIfExists('argciudads');
        Schema::dropIfExists('argprovincias');
        Schema::dropIfExists('bajoefectos');
        Schema::dropIfExists('bformularios');
        Schema::dropIfExists('brestados');
        Schema::dropIfExists('chprovincias');
        Schema::dropIfExists('discapacidads');
        Schema::dropIfExists('embarazoprevios');
        Schema::dropIfExists('embarazorelevamientos');
        Schema::dropIfExists('enfermedadcronicas');
        Schema::dropIfExists('franjaetarias');
        Schema::dropIfExists('generos');
        Schema::dropIfExists('hijosembarazos');
        Schema::dropIfExists('lesionconstatadas');
        Schema::dropIfExists('limitacions');
        Schema::dropIfExists('niveleducativos');
        Schema::dropIfExists('oficios');
        Schema::dropIfExists('paises');
        Schema::dropIfExists('residenciaprecarias');
        Schema::dropIfExists('tienedocs');
        Schema::dropIfExists('tienelesions');
        Schema::dropIfExists('tipodocumentos');
        Schema::dropIfExists('urprovincias');
        Schema::dropIfExists('bformulario_discapacidad');
        Schema::dropIfExists('bformulario_limitacion');
    }
}
