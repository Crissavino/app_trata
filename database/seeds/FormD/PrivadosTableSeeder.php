<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('privados')->insert([

            ['nombre' => 'Local, bar o expendio de bebidas alcohólicas'],

            ['nombre' => 'Vía pública'],
            
            ['nombre' => 'Privado'],

            ['nombre' => 'Domicilio particular'],

            ['nombre' => 'Hotel'],

            ['nombre' => 'Prostíbulo'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']

        ]);
    }
}
