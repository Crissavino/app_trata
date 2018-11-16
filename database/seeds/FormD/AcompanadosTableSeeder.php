<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcompanadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('acompanados')->insert([

            ['nombre' => 'Familiar'],

            ['nombre' => 'Conocido'],

            ['nombre' => 'No conocido'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
