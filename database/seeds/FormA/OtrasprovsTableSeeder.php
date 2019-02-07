<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtrasprovsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otrasprovs')->insert([

            ['nombre' => 'Buenos Aires'],

            ['nombre' => 'Catamarca'],

            ['nombre' => 'Chaco'],

            ['nombre' => 'Chubut'],

            ['nombre' => 'Córdoba'],

            ['nombre' => 'Corrientes'],

            ['nombre' => 'Entre Ríos'],

            ['nombre' => 'Formosa'],

            ['nombre' => 'Jujuy'],

            ['nombre' => 'La Pampa'],

            ['nombre' => 'La Rioja'],

            ['nombre' => 'Mendoza'],

            ['nombre' => 'Misiones'],

            ['nombre' => 'Neuquén'],

            ['nombre' => 'Río Negro'],

            ['nombre' => 'Salta'],

            ['nombre' => 'San Juan'],

            ['nombre' => 'San Luis'],

            ['nombre' => 'Santa Cruz'],

            ['nombre' => 'Santa Fe'],

            ['nombre' => 'Santiago del Estero'],

            ['nombre' => 'Tierra del Fuego'],

            ['nombre' => 'Tucumán']

        ]);
    }
}