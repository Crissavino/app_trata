<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AformulariosTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aformularios')->insert([

        	[
        		'datos_nombre_referencia' => 'CargaSeed',
        		'datos_numero_carpeta' => '1',
        		'datos_fecha_ingreso' => '1900-01-01',
        		'modalidad_id' => '1',
        		'estadocaso_id' => '1',
        		'datos_ente_judicial' => '1010',
        		'caratulacionjudicial_id' => '1',
        		'datos_nro_causa' => '1010',
                'updated_at' => '2018-10-31',
                'user_id' => '1'
        	]

        ]);

        DB::table('users')->insert([

            [
                'id' => '1',
                'name' => 'Cristian Savino',
                'email' => 'savino@cris.com',
                'password' => '123456'
            ]

        ]);
    }
}
