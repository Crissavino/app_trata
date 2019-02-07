<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivocierresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('motivocierres')->insert([

            ['nombre' => 'Por cumplimiento de objetivos'],

            ['nombre' => 'Por derivación'],

            ['nombre' => 'Por desistimiento al primer contacto'],

            ['nombre' => 'Por desistimiento durante el curso asistencial'],

            ['nombre' => 'Por caducidad']

        ]);
    }
}
