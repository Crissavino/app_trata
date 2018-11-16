<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipovictimasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipovictimas')->insert([

            ['nombre' => 'Directa'],

            ['nombre' => 'Indirecta'],

            ['nombre' => 'No es víctima'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
