<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TienedocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tienedocs')->insert([

        	['nombre' => 'Posee y Exhibe'],

        	['nombre' => 'Posee pero no exhibe'],

        	['nombre' => 'No posee'],

        	['nombre' => 'Retenido'],

        	['nombre' => 'En trámite'],

        	['nombre' => 'Se desconoce']

        ]);
    }
}
