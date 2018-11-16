<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HaycorrientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('haycorrientes')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
