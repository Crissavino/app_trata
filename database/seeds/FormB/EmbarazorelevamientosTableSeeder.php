<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmbarazorelevamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('embarazorelevamientos')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']

        ]);

    }
}
