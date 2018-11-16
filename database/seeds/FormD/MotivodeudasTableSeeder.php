<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivodeudasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivodeudas')->insert([

            ['nombre' => 'Alquiler'],

            ['nombre' => 'Comida'],

            ['nombre' => 'Movilidad'],

            ['nombre' => 'Ropa'],

            ['nombre' => 'Otro']

        ]);
    }
}
