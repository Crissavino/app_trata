<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaratulacionjudicialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('caratulacionjudicials')->insert([

            ['nombre' => 'Trata de personas'],
            
            ['nombre' => 'Delito conexo'],
            
            ['nombre' => 'No es delito'],
            
            ['nombre' => 'Delito de otra competencia'],
            
            ['nombre' => 'Otro']

        ]);    
    }
}
