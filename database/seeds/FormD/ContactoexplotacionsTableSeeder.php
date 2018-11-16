<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactoexplotacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactoexplotacions')->insert([

            ['nombre' => 'Conocido circunstancial'],

            ['nombre' => 'Cartel-ofrecimiento en vía pública'],

            ['nombre' => 'Familiar'],

            ['nombre' => 'Conocido no circunstancial'],

            ['nombre' => 'Redes sociales'],

            ['nombre' => 'Otro'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}