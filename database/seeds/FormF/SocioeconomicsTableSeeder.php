<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocioeconomicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socioeconomics')->insert([


            ['nombre' => 'Salud'],

            ['nombre' => 'Educación'],

            ['nombre' => 'Trabajo'],

            ['nombre' => 'Vivienda'],

            ['nombre' => 'Vincular'],

            ['nombre' => 'Refugio'],

            ['nombre' => 'Alimentos'],

            ['nombre' => 'Otro']
        ]);
    }
}
