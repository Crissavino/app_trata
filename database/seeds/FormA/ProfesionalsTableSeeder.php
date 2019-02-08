<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesionals')->insert([

            ['nombre_apellido_equipo' => 'Jessica Nerina Seimandi - Dirección', 'profesion' => 'Abogada',
             'email' => 'seimandijessica@gmail.com'],

            ['nombre_apellido_equipo' => 'Elina Contreras - Dirección',
             'profesion' => 'Trabajadora social', 'email' => 'contreraselina@gmail.com'],

            ['nombre_apellido_equipo' => 'Ezequiel Borra - Dirección',
            'profesion' => 'Abogado', 'email' => 'ezequielborra@gmail.com'],

            ['nombre_apellido_equipo' => 'Emiliano Lurbet - Equipo Barrios',
             'profesion' => 'Administrativo', 'email' => 'lurbet84@gmail.com'],

            ['nombre_apellido_equipo' => 'Correa, Anabella - Equipo Barrios',
             'profesion' => 'Psicóloga', 'email' => 'anillacorrea@hotmail.com'],

            ['nombre_apellido_equipo' => 'Jose Maria Retamasso - Equipo Barrios',
             'profesion' => 'Trabajador Social', 'email' => 'laumatjoa3@hotmail.com'],

            ['nombre_apellido_equipo' => 'Carolina Cabral - Equipo Barrios',
             'profesion' => 'Abogada', 'email' => 'caritocabral@gmail.com'],

            ['nombre_apellido_equipo' => 'Horacio Renone - Equipo Barrios',
             'profesion' => 'Administrativo', 'email' => 'emarenone22@gmail.com'],

            ['nombre_apellido_equipo' => 'Candela Chuliver - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'candelachuliver@hotmail.com'],

            ['nombre_apellido_equipo' => 'Licia Cipollone - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'liciacipollone@hotmail.com'],

            ['nombre_apellido_equipo' => 'Romina Camperchiolli - Equipo de rescate',
             'profesion' => 'Trabajadora Social', 'email' => 'romi975@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Victoria García - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'vickygarciaborda@gmail.com'],

            ['nombre_apellido_equipo' => 'Pamela Gisela Ledesma - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'pamelaledesmapsi@gmail.com'],

            ['nombre_apellido_equipo' => 'Mauro Javier Salgueira - Equipo de rescate',
             'profesion' => 'Abogado', 'email' => 'maurosalguierasos@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Eugenia Sánchez - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'eusan_@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Pilar Sanz - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'pilar_sanz@hotmail.com'],

            ['nombre_apellido_equipo' => 'Adrian Sein - Equipo de rescate',
             'profesion' => 'Abogado', 'email' => 'adriansein14@gmail.com'],

            ['nombre_apellido_equipo' => 'Martin Urtasun - Equipo de rescate',
             'profesion' => 'Antropólogo', 'email' => 'eduardomartinurtasun@gmail.com'],

            ['nombre_apellido_equipo' => 'Paola Vazquez - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'licvazquezpaola@gmail.com'],

            ['nombre_apellido_equipo' => 'Angela Gonzalez Touzett - Equipo de rescate',
             'profesion' => 'Abogada', 'email' => 'angelagtouzett@yahoo.com.ar'],

            ['nombre_apellido_equipo' => 'Paola Vega De Nazar - Equipo de rescate',
             'profesion' => 'Trabajadora Social', 'email' => 'paolaveganazar@hotmail.com'],

            ['nombre_apellido_equipo' => 'Belén Della Croce - Equipo de rescate',
             'profesion' => 'Musicoterapeuta', 'email' => 'belendellacroce@gmail.com'],

            ['nombre_apellido_equipo' => 'Carolina Piergentili - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'carolinapiergentili@hotmail.com'],

            ['nombre_apellido_equipo' => 'Sabrina Cosimano Simiele - Equipo de rescate',
             'profesion' => 'Abogada', 'email' => 'sabri_cos@hotmail.com'],

            ['nombre_apellido_equipo' => 'Daniela Baliño - Equipo de rescate',
             'profesion' => 'Psicóloga', 'email' => 'A la espera']

        ]);
    }
}
