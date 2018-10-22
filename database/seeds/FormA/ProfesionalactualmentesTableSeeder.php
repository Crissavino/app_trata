<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionalactualmentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesionalactualmentes')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No']

        ]);
    }
}
