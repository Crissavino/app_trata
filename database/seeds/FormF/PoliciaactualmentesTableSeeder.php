<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliciaactualmentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policiaactualmentes')->insert([

            ['nombre' => 'Federal'],

            ['nombre' => 'Provincial'],

            ['nombre' => 'Local'],

            ['nombre' => 'Prefectura'],

            ['nombre' => 'Gendarmería']

        ]);
    }
}
