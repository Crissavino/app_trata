<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciaconceptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especiaconceptos')->insert([

            ['nombre' => 'Comida'],
            
            ['nombre' => 'Vivienda'],
            
            ['nombre' => 'Escolarización de hijos'],
            
            ['nombre' => 'Vestimenta'],
            
            ['nombre' => 'Otro']
            
        ]);
    }
}
 
 
 
 
