<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VinculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vinculos')->insert([

            ['nombre' => 'Familiar'],

            ['nombre' => 'Pareja'],

            ['nombre' => 'Amistad'],

            ['nombre' => 'Conocido'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']

        ]);
    }
}
