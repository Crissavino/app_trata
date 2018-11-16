<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HaymedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('haymedidas')->insert([

            ['nombre' => 'Cámaras'],

            ['nombre' => 'Personal de seguridad'],

            ['nombre' => 'Rejas'],

            ['nombre' => 'No posee'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']

        ]);
    }
}
