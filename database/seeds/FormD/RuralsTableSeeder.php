<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rurals')->insert([

            ['nombre' => 'Feria'],

            ['nombre' => 'Verdulería'],

            ['nombre' => 'Supermercado'],

            ['nombre' => 'Particular'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']
        ]);
    }
}
