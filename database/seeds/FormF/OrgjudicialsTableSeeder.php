<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgjudicialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orgjudicials')->insert([

            ['nombre' => 'Fiscalías'],

            ['nombre' => 'Juzgado']

        ]);
    }
}
