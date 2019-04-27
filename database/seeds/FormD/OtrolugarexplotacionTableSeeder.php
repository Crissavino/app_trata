<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtrolugarexplotacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otrolugarexplotacions')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No']

        ]);
    }
}
