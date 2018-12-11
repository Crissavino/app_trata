<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VinculacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vinculacions')->insert([

        	['nombre' => 'Familiar'],

        	['nombre' => 'Pareja'],

        	['nombre' => 'Sin vínculo'],

        	['nombre' => 'Conocido'],

        	['nombre' => 'Se desconoce'],

        	['nombre' => 'Otro']

        ]);
    }
}