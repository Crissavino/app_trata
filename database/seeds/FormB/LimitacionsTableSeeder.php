<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('limitacions')->insert([

            ['nombre' => 'Analfabetismo'],

            ['nombre' => 'Discapacidad'],

            ['nombre' => 'Idioma'],

            ['nombre' => 'No'],

            ['nombre' => 'Otro']

        ]);
    }
}
