<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viajos')->insert([

            ['nombre' => 'Solo/a'],

            ['nombre' => 'Acompañado/a'],

            ['nombre' => 'No viajó'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
