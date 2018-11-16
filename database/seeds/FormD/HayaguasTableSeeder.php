<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HayaguasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hayaguas')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
