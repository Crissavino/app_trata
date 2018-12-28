<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgprognacionalactualmentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('orgprognacionalactualmentes')->insert([

            ['nombre' => 'Programa Nacional de Rescate y Acompañamiento a Víctimas de Trata'],

            ['nombre' => 'Procuraduría de Trata y Explotación de Personas (PROTEX)'],

            ['nombre' => 'Programa Nacional de Protección a Testigos e Imputados'],

            ['nombre' => 'Registro Nacional de Trabajadores Rurales y Empleadores (RENATRE)'],

            ['nombre' => 'Registro Nacional de las Personas (RENAPER)'],

            ['nombre' => 'Registro Nacional de Información de Personas Menores Extraviadas'],

            ['nombre' => 'Programa “Las Víctimas contra las Violencias'],

            ['nombre' => 'Secretaría Nacional de Niñez, Adolescencia y Familia (SENNAF)'],

            ['nombre' => 'Otro']

        ]);
    }
}
