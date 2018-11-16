<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermanenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permanencias')->insert([

            ['nombre' => '0 a 3 meses'],

            ['nombre' => '4 a 11 meses'],

            ['nombre' => '1 a 3 años'],

            ['nombre' => '4 a 10 años'],

            ['nombre' => '11 años o más'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
