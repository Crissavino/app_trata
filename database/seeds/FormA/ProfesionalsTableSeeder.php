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

            ['nombre_apellido_equipo' => 'Jessica Nerina Seimandi - Dirección',
             'email' => 'seimandijessica@gmail.com'],

            ['nombre_apellido_equipo' => 'Mercedes Ratti - Dirección',
             'email' => 'mercedes.ratti@gmail.com'],

            ['nombre_apellido_equipo' => 'Elina Contreras - Dirección',
             'email' => 'contreraselina@gmail.com'],

            ['nombre_apellido_equipo' => 'Emiliano Lurbet - Equipo Barrios',
             'email' => 'lurbet84@gmail.com'],

            ['nombre_apellido_equipo' => 'Correa, Anabella - Equipo Barrios',
             'email' => 'anillacorrea@hotmail.com'],

            ['nombre_apellido_equipo' => 'Jose Maria Retamasso - Equipo Barrios',
             'email' => 'laumatjoa3@hotmail.com'],

            ['nombre_apellido_equipo' => 'Carolina Cabral - Equipo Barrios',
             'email' => 'caritocabral@gmail.com'],

            ['nombre_apellido_equipo' => 'Horacio Renone - Equipo Barrios',
             'email' => 'emarenone22@gmail.com'],

            ['nombre_apellido_equipo' => 'Jorge samuel Chocobar - Equipo Barrios',
             'email' => ''],

            ['nombre_apellido_equipo' => 'Candela Chuliver - Equipo de rescate',
             'email' => 'candelachuliver@hotmail.com'],

            ['nombre_apellido_equipo' => 'Licia Cipollone - Equipo de rescate',
             'email' => 'liciacipollone@hotmail.com'],

            ['nombre_apellido_equipo' => 'Romina Camperchiolli - Equipo de rescate',
             'email' => 'romi975@hotmail.com'],

            ['nombre_apellido_equipo' => 'Florencia Daireaux - Equipo de rescate',
             'email' => 'flor_dero@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Victoria García - Equipo de rescate',
             'email' => 'vickygarciaborda@gmail.com'],

            ['nombre_apellido_equipo' => 'Pamela Gisela Ledesma - Equipo de rescate',
             'email' => 'pamelaledesmapsi@gmail.com'],

            ['nombre_apellido_equipo' => 'Mauro Javier Salgueira - Equipo de rescate',
             'email' => 'maurosalguierasos@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Eugenia Sánchez - Equipo de rescate',
             'email' => 'eusan_@hotmail.com'],

            ['nombre_apellido_equipo' => 'María Pilar Sanz - Equipo de rescate',
             'email' => 'pilar_sanz@hotmail.com'],

            ['nombre_apellido_equipo' => 'Adrian Sein - Equipo de rescate',
             'email' => 'adriansein14@gmail.com'],

            ['nombre_apellido_equipo' => 'Martin Urtasun - Equipo de rescate',
             'email' => 'eduardomartinurtasun@gmail.com'],

            ['nombre_apellido_equipo' => 'Paola Vazquez - Equipo de rescate',
             'email' => 'licvazquezpaola@gmail.com'],

            ['nombre_apellido_equipo' => 'Angela Gonzalez Touzett - Equipo de rescate',
             'email' => 'angelagtouzett@yahoo.com.ar'],

            ['nombre_apellido_equipo' => 'Paola Vega De Nazar - Equipo de rescate',
             'email' => 'paolaveganazar@hotmail.com'],

            ['nombre_apellido_equipo' => 'Belén Della Croce - Equipo de rescate',
             'email' => 'belendellacroce@gmail.com']

            // ['nombre_apellido_equipo' => 'Diego Campero - Equipo de planificación',
            //  'email' => 'lic.diegocampero@gmail.com'],

            // ['nombre_apellido_equipo' => 'Maria Alejandro Cardoso - Equipo de planificación',
            //  'email' => 'alejandrocardoso@yahoo.com'],

            // ['nombre_apellido_equipo' => 'Luciano Ramis - Equipo de planificación',
            //  'email' => 'luchoramis@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Cecilia Svanossi - Equipo de planificación',
            //  'email' => 'cecilia_svanossi2@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Paula Labombarda - Equipo de planificación',
            //  'email' => 'polilabomba@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Camila Ledesma - Equipo de planificación',
            //  'email' => 'camilaledesma93@outlook.es'],

            // ['nombre_apellido_equipo' => 'Luciana Salgueira - Equipo de planificación',
            //  'email' => 'lusalgueira@gmail.com'],

            // ['nombre_apellido_equipo' => 'María Garro - Administrativo',
            //  'email' => 'mariag.garro_jcmc@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Soledad Iglesias - Administrativo',
            //  'email' => 'soleiglesias87@gmail.com'],

            // ['nombre_apellido_equipo' => 'Denisse Noguera - Administrativo',
            //  'email' => 'denisse-noguera@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Florencia Sánchez Turi - Administrativo',
            //  'email' => 'florenciasanchez_turi@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Rosario Sánchez - Subsecretaría',
            //  'email' => 'rosariosanchez@live.com.ar'],

            // ['nombre_apellido_equipo' => 'Lorena Signore - Subsecretaría',
            //  'email' => 'lorenasignore@hotmail.com'],

            // ['nombre_apellido_equipo' => 'Lucía Moreno - Subsecretaría',
            //  'email' => 'lucia.moreno@outlook.com.ar']


        ]);
    }
}
