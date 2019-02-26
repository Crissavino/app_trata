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

            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => '$2a$10$KIUZpRJ5P5RL79.XTLtYUOSdWf.mpS8doBKOe7i4IONJgfgRxruyO', 'isAdmin' => 1],

            ['name' => 'Contreras, Elina', 'email' => 'contreraselina@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],
            
            ['name' => 'Borra, Ezequiel', 'email' => 'ezequielborra@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Lurbet, Emiliano', 'email' => 'lurbet84@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Correa, Anabella', 'email' => 'anillacorrea@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Retamasso,Jose Maria', 'email' => 'laumatjoa3@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Cabral,Carolina ', 'email' => 'caritocabral@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Renone, Horacio', 'email' => 'emarenone22@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Chuliver, Candela', 'email' => 'candelachuliver@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Cipollone, Licia', 'email' => 'liciacipollone@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Camperchiolli Romina', 'email' => 'romi975@hotmail.com  ', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'García, María Victoria ', 'email' => 'vickygarciaborda@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Ledesma, Pamela Gisela', 'email' => 'pamelaledesmapsi@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Salgueira, Mauro Javier', 'email' => 'maurosalguierasos@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Sánchez María Eugenia', 'email' => 'eusan_@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Sanz, María Pilar', 'email' => 'pilar_sanz@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Sein, Adrian', 'email' => 'adriansein14@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Urtasun, Martin', 'email' => 'eduardomartinurtasun@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Vazquez, Paola', 'email' => 'licvazquezpaola@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Gonzalez Touzett, Angela', 'email' => 'angelagtouzett@yahoo.com.ar', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Vega De Nazar, Paola', 'email' => 'paolaveganazar@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Della Croce, Belén', 'email' => 'belendellacroce@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Piergentili, Carolina', 'email' => 'carolinapiergentili@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Cosimano Simiele, Sabrina', 'email' => 'sabri_cos@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Baliño, Daniela', 'email' => 'faltamail@admin.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 0],

            ['name' => 'Seimandi, Jessica Nerina', 'email' => 'seimandijessica@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 1],

            ['name' => 'Sánchez, Rosario', 'email' => 'rosariosanchez@live.com.ar', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 1],

            ['name' => 'Campero, Diego', 'email' => 'lic.diegocampero@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Cardoso, Maria Alejandro', 'email' => 'alejandrocardoso@yahoo.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Ramis, Luciano', 'email' => 'luchoramis@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Svanossi, Cecilia', 'email' => 'cecilia_svanossi2@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Labombarda, Paula', 'email' => 'polilabomba@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Ledesma, Camila', 'email' => 'camilaledesma93@outlook.es', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Salgueira, Luciana', 'email' => 'lusalgueira@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Garro, María', 'email' => 'mariag.garro_jcmc@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Iglesias, Soledad', 'email' => 'soleiglesias87@gmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Noguera, Denisse', 'email' => 'denisse-noguera@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Sánchez Turi, Florencia', 'email' => 'florenciasanchez_turi@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Lorena Signore', 'email' => 'lorenasignore@hotmail.com', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Lucía Moreno', 'email' => 'lucia.moreno@outlook.com.ar', 'password' => '$2a$10$hfdBRCUo1Oxse.z7hI7fzuAKAhmpUnkr1j.77UzfRMDxd.ybHM18q', 'isAdmin' => 2],

            ['name' => 'Cristian Maximiliano Savino', 'email' => 'savinocristian89@gmail.com', 'password' => '$2a$10$yb2V.HIbsx0MtEWkJAf70OW3dupMlXnBnFRB663kR.1qMu859/Z9C', 'isAdmin' => 1]

        ]);
    }
}
