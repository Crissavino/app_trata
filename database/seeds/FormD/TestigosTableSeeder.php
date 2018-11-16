<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testigos')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No']
        ]);
    }
}
