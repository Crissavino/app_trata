<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BajoefectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bajoefectos')->insert([
            
            ['nombre' => 'Si'],
            
            ['nombre' => 'No'],
            
            ['nombre' => 'Se desconoce']
        ]);
    }
}
