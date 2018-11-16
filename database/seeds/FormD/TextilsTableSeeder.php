<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('textils')->insert([

            ['nombre' => 'Feria'],

            ['nombre' => 'Local de venta'],

            ['nombre' => 'Particular'],
            
            ['nombre' => 'Vía pública'],

            ['nombre' => 'Se desconoce'],

            ['nombre' => 'Otro']

        ]);
    }
}
