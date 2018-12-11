<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edocumentos')->insert([

            ['nombre' => 'DNI'],

            ['nombre' => 'Pasaporte'],

            ['nombre' => 'LC - LE'],

            ['nombre' => 'Documento extranjero'],

            ['nombre' => 'Residencia precaria'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']

        ]);
    }
}
