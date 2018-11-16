<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HaybanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('haybanos')->insert([

            ['nombre' => 'Baño'],

            ['nombre' => 'Letrina'],

            ['nombre' => 'No tiene'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
