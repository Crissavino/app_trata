<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipodocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipodocumentos')->insert([

            ['nombre' => 'D.N.I.'],

            ['nombre' => 'Documento Extranjero'],

            ['nombre' => 'Libreta Cívica'],

            ['nombre' => 'Libreta de Enrolamiento'],

            ['nombre' => 'Pasaporte'],

            ['nombre' => 'Residencia Precaria'],

            ['nombre' => 'Se Desconoce'],

            ['nombre' => 'No posee'],

            ['nombre' => 'Otro']

        ]);
    }
}
