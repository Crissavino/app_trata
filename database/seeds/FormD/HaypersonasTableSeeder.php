<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HaypersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('haypersonas')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
