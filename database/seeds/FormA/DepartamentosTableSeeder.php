<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([

            ['nombre' => 'Azul'],

            ['nombre' => 'Bahía Blanca'],

            ['nombre' => 'Dolores'],

            ['nombre' => 'Junín'],

            ['nombre' => 'La Matanza'],

            ['nombre' => 'La Plata'],

            ['nombre' => 'Lomas de Zamora'],

            ['nombre' => 'Mar del Plata'],

            ['nombre' => 'Mercedes'],

            ['nombre' => 'Morón'],

            ['nombre' => 'Necochea'],

            ['nombre' => 'Pergamino'],

            ['nombre' => 'Quilmes'],

            ['nombre' => 'San Isidro'],

            ['nombre' => 'San Martín'],

            ['nombre' => 'San Nicolás'],

            ['nombre' => 'Trenque Lauquen'],

            ['nombre' => 'Zárate-Campana']


        ]);
    }
}