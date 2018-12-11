<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoldelitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roldelitos')->insert([

        	['nombre' => 'Ofrecimiento'],

        	['nombre' => 'Captación'],

        	['nombre' => 'Traslado'],

        	['nombre' => 'Acogida'],

        	['nombre' => 'Explotación'],

        	['nombre' => 'Se desconoce']
        	
        ]);
    }
}
     