<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcompanadoredsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acompanadoreds')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
