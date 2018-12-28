<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LugardeudasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lugardeudas')->insert([

            ['nombre' => 'Nacional'],

            ['nombre' => 'Exterior'],

            ['nombre' => 'Nacional y Exterior']
        ]);
    }
}
