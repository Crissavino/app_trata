<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('finalidads')->insert([

            ['nombre' => 'Laboral'],
            
            ['nombre' => 'Sexual'],

            ['nombre' => 'Mixto'],
            
            ['nombre' => 'No determinada'],

            ['nombre' => 'Otro']
                    
        ]);
    }
}







