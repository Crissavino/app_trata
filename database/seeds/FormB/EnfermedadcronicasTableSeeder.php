<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnfermedadcronicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enfermedadcronicas')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}
