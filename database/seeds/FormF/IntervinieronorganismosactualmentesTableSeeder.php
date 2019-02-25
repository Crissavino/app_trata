<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervinieronorganismosactualmentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intervinieronorganismosactualmentes')->insert([

            ['nombre' => 'Sí'],

            ['nombre' => 'No']

        ]);
    }
}
