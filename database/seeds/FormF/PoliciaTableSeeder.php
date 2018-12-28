<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policias')->insert([

            ['nombre' => 'Federal'],

            ['nombre' => 'Provincial'],

            ['nombre' => 'Local'],

            ['nombre' => 'Prefectura'],

            ['nombre' => 'Gendarmería']

        ]);
    }
}
