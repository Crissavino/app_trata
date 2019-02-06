<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidads')->insert([

            ['nombre' => 'Allanamiento'],

            ['nombre' => 'Denuncia'],

            ['nombre' => 'Presentación espontánea'],

            ['nombre' => 'Fiscalización laboral'],

            ['nombre' => 'Derivación de otro organismo']

        ]);
    }
}
