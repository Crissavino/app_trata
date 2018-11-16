<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([

            ['nombre' => 'Ladrillo / Piedra / Bloque de hormigón / Porcelanato'],

            ['nombre' => 'Adobe'],

            ['nombre' => 'Madera'],

            ['nombre' => 'Chapa de metal o Fibrocemento'],

            ['nombre' => 'Chorizo / Cartón / Palma / Paja sola / Material de deshecho'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']
        ]);
    }
}
