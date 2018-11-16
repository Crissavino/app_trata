<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalificaciongeneralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calificaciongenerals')->insert([

            ['nombre' => 'Trata de personas'],

            ['nombre' => 'Delito conexo'],

            ['nombre' => 'Desaparición de persona'],

            ['nombre' => 'Averiguación de ilícito'],

            ['nombre' => 'Delitos de otra competencia'],

            ['nombre' => 'No es delito'],

            ['nombre' => 'Fiscalización laboral'],

            ['nombre' => 'Otro']

        ]);
    }
}
