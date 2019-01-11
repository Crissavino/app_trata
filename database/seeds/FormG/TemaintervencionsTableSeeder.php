<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemaintervencionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temaintervencions')->insert([

            ['nombre' => 'SALUD'],

            ['nombre' => 'EDUCACIÓN'],

            ['nombre' => 'VIVIENDA'],

            ['nombre' => 'PROGRAMAS SOCIALES'],

            ['nombre' => 'NIÑEZ'],

            ['nombre' => 'ATENCIÓN INMEDIATA'],

            ['nombre' => 'JUDICIAL'],

            ['nombre' => 'PUNTO FOCAL'],

            ['nombre' => 'OTRO']

        ]);
    }
}
