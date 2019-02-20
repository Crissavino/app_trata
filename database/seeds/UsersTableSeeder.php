<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => '$2a$10$KIUZpRJ5P5RL79.XTLtYUOSdWf.mpS8doBKOe7i4IONJgfgRxruyO', 'isAdmin' => 1]
           
        ]);
    }
}
