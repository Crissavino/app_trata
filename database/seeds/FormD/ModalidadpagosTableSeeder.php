<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadpagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidadpagos')->insert([

            ['nombre' => 'Fijo'],

            ['nombre' => 'A destajo'],

            ['nombre' => 'Porcentaje'],

            ['nombre' => 'En especias'],

            ['nombre' => 'Nula'],

            ['nombre' => 'Se desconoce']
        ]);
    }
}
