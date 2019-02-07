<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEformulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('eformularios', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombreApellido');
        //     $table->integer('edocumentos_id')->unsigned();
        //     $table->string('documentoCual')->nullable();
        //     $table->string('numeroDocumento')->nullable();
        //     $table->string('edad')->nullable();
        //     $table->integer('genero_id')->unsigned();
        //     $table->string('generoCual')->nullable();
        //     $table->integer('vinculacion_id')->unsigned();
        //     $table->string('vinculacionCual')->nullable();
        //     $table->integer('user_id')->unsigned();
        //     $table->string('numeroCarpeta');
        //     $table->softDeletesTz();
        //     $table->timestampsTz();
        // });

        // Schema::create('edocumentos', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre');
        //     $table->softDeletesTz();
        //     $table->timestampsTz();
        // });

        // Schema::create('vinculacions', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre');
        //     $table->softDeletesTz();
        //     $table->timestampsTz();
        // });

        // Schema::create('roldelitos', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre');
        //     $table->softDeletesTz();
        //     $table->timestampsTz();
        // });

        // Schema::create('eformulario_roldelito', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('roldelito_id')->unsigned();
        //     $table->integer('eformulario_id')->unsigned();
        //     $table->softDeletesTz();
        //     $table->timestampsTz();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('eformularios');
        // Schema::dropIfExists('edocumentos');
        // Schema::dropIfExists('vinculacions');
        // Schema::dropIfExists('roldelitos');
        // Schema::dropIfExists('eformulario_roldelito');
    }
}
