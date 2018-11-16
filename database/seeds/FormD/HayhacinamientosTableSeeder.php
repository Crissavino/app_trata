<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HayhacinamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hayhacinamientos')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
