<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrecuenciapagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frecuenciapagos')->insert([

            ['nombre' => 'Diaria'],

            ['nombre' => 'Semanal'],
            
            ['nombre' => 'Mensual'],

            ['nombre' => 'Nula'],
            
            ['nombre' => 'Se desconoce']
            
        ]);
    }
}
