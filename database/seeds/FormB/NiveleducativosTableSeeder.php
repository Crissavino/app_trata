<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveleducativosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveleducativos')->insert([

            ['nombre' => 'Sin instrucción formal'],

            ['nombre' => 'Primario incompleto'],

            ['nombre' => 'Primario completo'],

            ['nombre' => 'Secundario incompleto'],

            ['nombre' => 'Secundario completo'],

            ['nombre' => 'Terciario-Universitario incompleto'],

            ['nombre' => 'Terciario-Universitario completo'],

            ['nombre' => 'Se desconoce']

        ]);
    }
}
