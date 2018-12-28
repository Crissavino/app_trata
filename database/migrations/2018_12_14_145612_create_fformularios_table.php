<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFformulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fformularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroCarpeta');
            // $table->integer('orgJudiciales_id')->unsigned();
            // $table->integer('orgProgNacionales_id')->unsigned();
            // $table->string('orgprognacionalOtro')->nullable();
            // $table->string('orgProgProvinciales');
            // $table->string('orgProgMunicipales');
            // $table->integer('policia_id')->unsigned();
            // $table->string('orgSocCivil');
            $table->string('socioeconomicaCual')->nullable();
            // $table->string('orgprognacionalActualmenteOtro')->nullable();
            // $table->string('orgProgProvincialesActualmente');
            // $table->string('orgProgMunicipalesActualmente');
            // $table->string('orgSocCivilActualmente');
            $table->integer('user_id')->unsigned();
            $table->softDeletesTz();
            $table->timestamps();
        });

        //relacion uno a muchos para agregar mas de un otro        
        Schema::create('orgprognacionalotros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprogprovincials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprogmunicipals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgsoccivils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprognacionalactualmenteotros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprogprovincialesactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprogmunicipalesactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgsoccivilactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreOrganismo')->nullable();
            $table->integer('fformulario_id')->nullable()->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgjudicials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprognacionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('policias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgjudicialactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('orgprognacionalactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('policiaactualmentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('asistencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('socioeconomics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_orgjudicial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orgjudicial_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_orgprognacional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orgprognacional_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_policia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('policia_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('asistencia_fformulario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('asistencia_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_socioeconomic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('socioeconomic_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_orgjudicialactualmente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orgjudicialactualmente_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_orgprognacionalactualmente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orgprognacionalactualmente_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        Schema::create('fformulario_policiaactualmente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('policiaactualmente_id')->unsigned();
            $table->integer('fformulario_id')->unsigned();
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
        Schema::dropIfExists('fformularios');
        Schema::dropIfExists('orgprognacionalotros');
        Schema::dropIfExists('orgprogprovincials');
        Schema::dropIfExists('orgprogmunicipals');
        Schema::dropIfExists('orgsoccivils');
        Schema::dropIfExists('orgprognacionalactualmenteotros');
        Schema::dropIfExists('orgprogprovincialesactualmentes');
        Schema::dropIfExists('orgprogmunicipalesactualmentes');
        Schema::dropIfExists('orgsoccivilactualmentes');
        Schema::dropIfExists('orgjudicials');
        Schema::dropIfExists('orgprognacionals');
        Schema::dropIfExists('policias');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('socioeconomics');
        Schema::dropIfExists('orgjudicialactualmentes');
        Schema::dropIfExists('orgprognacionalactualmentes');
        Schema::dropIfExists('policiaactualmentes');
        Schema::dropIfExists('fformulario_orgjudicial');
        Schema::dropIfExists('fformulario_orgprognacional');
        Schema::dropIfExists('fformulario_policia');
        Schema::dropIfExists('asistencia_fformulario');
        Schema::dropIfExists('fformulario_socioeconomic');
    }
}
