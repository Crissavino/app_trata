<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VicindirectasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vicindirectas')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce'],

        ]);
    }
}
