<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('oficios')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}
