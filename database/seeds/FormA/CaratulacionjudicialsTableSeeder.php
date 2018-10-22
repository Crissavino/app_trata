<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaratulacionjudicialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('caratulacionjudicials')->insert([

            ['nombre' => 'Trata de personas con fines de explotación laboral'],

            ['nombre' => 'Trata de personas con fines de explotación sexual'],

            ['nombre' => 'Trata - pornografía infantil'],

            ['nombre' => 'Trata - matrimonio forzoso'],

            ['nombre' => 'Trata laboral infantil (148 bis CP)'],

            ['nombre' => 'Trata mixta'],

            ['nombre' => 'Delito conexo con fines de explotación sexual'],

            ['nombre' => 'Delito conexo con fines de explotación laboral'],

            ['nombre' => 'Delito conexo - pornografía infantil'],

            ['nombre' => 'Delito conexo - matrimonio forzoso (140 CP)'],

            ['nombre' => 'Delito conexo - laboral infantil (148 bis CP)'],

            ['nombre' => 'Delito conexo - mixto'],

            ['nombre' => 'Delitos de otra competencia'],

            ['nombre' => 'Reducción a la servidumbre (Finalidades de la Ley 26.842 y 140 CP)'],

            ['nombre' => 'Trabajo forzoso (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Explotación de la prostitución ajena (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Pornografía infantil (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Extracción de órganos y fluidos (Finalidades de la Ley 26.842)'],

            ['nombre' => 'Averiguación de ilícitos'],

            ['nombre' => 'Búsqueda de paradero'],

            ['nombre' => 'No es delito'],

            ['nombre' => 'Trabajo precario (no es delito)'],

            ['nombre' => 'Sin datos'],

            ['nombre' => 'Fiscalización'],

            ['nombre' => 'Otro']

        ]);    
    }
}
