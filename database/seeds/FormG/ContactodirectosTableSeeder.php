<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactodirectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactodirectos')->insert([

            ['nombre' => 'Si'],

            ['nombre' => 'No']

        ]);
    }
}
