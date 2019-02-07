<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmbitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ambitos')->insert([

            ['nombre' => 'Federal'],

            ['nombre' => 'Provincial (Buenos Aires)'],

            ['nombre' => 'Otra provincia']
            
        ]);
    }
}
