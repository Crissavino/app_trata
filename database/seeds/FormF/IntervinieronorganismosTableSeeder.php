<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervinieronorganismosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intervinieronorganismos')->insert([

            ['nombre' => 'No'],

            ['nombre' => 'Intervino solo el organismo que derivó'],

            ['nombre' => 'Intervinieron más organismos']

        ]);
    }
}
