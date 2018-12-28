<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgjudicialactualmentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orgjudicialactualmentes')->insert([

            ['nombre' => 'Fiscalías'],

            ['nombre' => 'Juzgado']

        ]);
    }
}
