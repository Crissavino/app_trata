<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrprovinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urprovincias')->insert([

        	['provincia_nombre' => 'Artigas'],

        	['provincia_nombre' => 'Canelones'],

        	['provincia_nombre' => 'Cerro Largo'],

        	['provincia_nombre' => 'Colonia'],

        	['provincia_nombre' => 'Durazno'],

        	['provincia_nombre' => 'Flores'],

        	['provincia_nombre' => 'Florida'],

        	['provincia_nombre' => 'Lavalleja'],

        	['provincia_nombre' => 'Maldonado'],

        	['provincia_nombre' => 'Montevideo'],

        	['provincia_nombre' => 'Paysandú'],

        	['provincia_nombre' => 'Río Negro'],

        	['provincia_nombre' => 'Rivera'],

        	['provincia_nombre' => 'Rocha'],

        	['provincia_nombre' => 'Salto'],

        	['provincia_nombre' => 'San José'],

        	['provincia_nombre' => 'Soriano'],

        	['provincia_nombre' => 'Tacuarembó'],

        	['provincia_nombre' => 'Treinta y Tres'],

        	['provincia_nombre' => 'Se desconoce']




        ]);
    }
}