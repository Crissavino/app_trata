<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranjaetariasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('franjaetarias')->insert([

            ['nombre' => '0 a 11 años'],

            ['nombre' => '12 a 18 años'],

            ['nombre' => '19 a 30 años'],

            ['nombre' => '31 a 50 años'],

            ['nombre' => '51 a 65 años'],

            ['nombre' => '65 años o más'],

            ['nombre' => 'Se desconoce']

        ]);  
    }
}
