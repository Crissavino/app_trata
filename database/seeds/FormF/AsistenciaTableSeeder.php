<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsistenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asistencias')->insert([

            ['nombre' => 'Jurídica'],

            ['nombre' => 'Psicológica'],

            ['nombre' => 'Socioeconómica']
        ]);
    }
}
