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

            ['nombre' => 'De oficio'],

            ['nombre' => 'Presentación espontánea'],

            ['nombre' => 'Derivación de otro organismo']

        ]);
    }
}
