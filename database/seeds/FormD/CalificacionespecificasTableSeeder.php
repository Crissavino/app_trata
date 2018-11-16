<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalificacionespecificasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calificacionespecificas')->insert([

            ['nombre' => 'Averiguación de ilícito'],

            ['nombre' => 'Delito conexo con fines de explotación laboral'],

            ['nombre' => 'Delito conexo con fines de explotación sexual'],

            ['nombre' => 'Delito conexo mixto'],

            ['nombre' => 'Delito conexo-laboral infantil (148 bis CP)'],

            ['nombre' => 'Delito conexo-matrimonio forzoso (140 CP)'],

            ['nombre' => 'Delito conexo-pornografía infantil'],

            ['nombre' => 'Delitos de otra competencia'],

            ['nombre' => 'Explotación de la prostitución ajena (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Extracción de órganos y fluídos (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Pornografía infantil (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Reducción a la servidumbre (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Sin datos'],

            ['nombre' => 'Trabajoforzoso (FinalidadesdelaLey26.842)'],

            ['nombre' => 'Trabajo precario (No es delito)'],

            ['nombre' => 'rata de personas con fines de explotación laboral'],

            ['nombre' => 'Trata de personas con fines de explotación sexual Trata laboral infantil (148 bis CP)'],

            ['nombre' => 'Trata mixta'],

            ['nombre' => 'Trata - matrimonio forzoso Trata - pornografía infantil'],

            ['nombre' => 'No es delito'],
        ]);
    }
}