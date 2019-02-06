<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividads')->insert([

            ['nombre' => 'Rural'],

            ['nombre' => 'Manufacturación de materias primas'],

            // ['nombre' => 'Privado'],

            ['nombre' => 'Prostitución'],

            ['nombre' => 'Prostitución de menores'],

            ['nombre' => 'Producción textil'],

            ['nombre' => 'Local/Bar/Expendio de bebidas'],

            ['nombre' => 'Otro']
        ]);
    }
}
