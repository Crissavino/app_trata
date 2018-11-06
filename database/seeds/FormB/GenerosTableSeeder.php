<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([

            ['nombre' => 'Mujer Cis'],

            ['nombre' => 'Mujer Trans'],

            ['nombre' => 'Varon Cis'],

            ['nombre' => 'Varon Trans'],

            ['nombre' => 'Otro'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}
