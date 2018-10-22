<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentacionespontaneasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presentacionespontaneas')->insert([

            ['nombre' => 'Con datos del denunciante'],

            ['nombre' => 'Denunciante anónimo']

        ]);
    }
}
