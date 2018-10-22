<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscapacidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discapacidads')->insert([

            ['nombre' => 'Físico/Motriz'],

            ['nombre' => 'Intelectual/Adaptativo'],

            ['nombre' => 'Psíquica'],

            ['nombre' => 'Sensorial'],

            ['nombre' => 'No'],

            ['nombre' => 'Se desconoce']

        ]);

    }
}
