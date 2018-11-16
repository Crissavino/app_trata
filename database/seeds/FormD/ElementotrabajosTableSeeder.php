<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementotrabajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elementotrabajos')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
