<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidenciaprecariasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residenciaprecarias')->insert([

        	['nombre' => 'Vigente'],

        	['nombre' => 'Vencida'],

        	['nombre' => 'Se desconoce']

        ]);
    }
}
