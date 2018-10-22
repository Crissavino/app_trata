<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesionals')->insert([

            ['nombre_apellido_profesion' => 'Cristian Savino - Ecologo/a Social'],

            ['nombre_apellido_profesion' => 'Cristian Savino - Trabajador/a Social'],

            ['nombre_apellido_profesion' => 'Cristian Savino - Abogado/a'],

            ['nombre_apellido_profesion' => 'Cristian Savino - Psicologo/a'],

            ['nombre_apellido_profesion' => 'Cristian Savino - Antropologo/a'],

            ['nombre_apellido_profesion' => 'Cristian Savino - Lic. Seguridad Ciudadana y Políticas Públicas']

        ]);
    }
}
