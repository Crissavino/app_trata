<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TienelesionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tienelesions')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}
