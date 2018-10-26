<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrestadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('brestados')->insert([

        	['nombre_estado' => 'Acre'],

			['nombre_estado' => 'Alagoas'],

			['nombre_estado' => 'Amapá'],

			['nombre_estado' => 'Amazonas'],

			['nombre_estado' => 'Bahia'],

			['nombre_estado' => 'Ceará'],

			['nombre_estado' => 'Distrito Federal'],

			['nombre_estado' => 'Espirito Santo'],

			['nombre_estado' => 'Goiás'],

			['nombre_estado' => 'Maranhão'],

			['nombre_estado' => 'Mato Grosso do Sul'],

			['nombre_estado' => 'Mato Grosso'],

			['nombre_estado' => 'Minas Gerais'],

			['nombre_estado' => 'Pará'],

			['nombre_estado' => 'Paraíba'],

			['nombre_estado' => 'Paraná'],

			['nombre_estado' => 'Pernambuco'],

			['nombre_estado' => 'Piauí'],

			['nombre_estado' => 'Rio de Janeiro'],

			['nombre_estado' => 'Rio Grande do Norte'],

			['nombre_estado' => 'Rio Grande do Sul'],

			['nombre_estado' => 'Rondônia'],

			['nombre_estado' => 'Roraima'],

			['nombre_estado' => 'Santa Catarina'],

			['nombre_estado' => 'São Paulo'],

			['nombre_estado' => 'Sergipe'],

			['nombre_estado' => 'Tocantins'],

			['nombre_estado' => 'Se desconoce']

		]);
    }
}
