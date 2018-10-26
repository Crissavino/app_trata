<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArgprovinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('argprovincias')->insert([

			['provincia_nombre' => 'Buenos Aires'],
			
			['provincia_nombre' => 'Buenos Aires-GBA'],
			
			['provincia_nombre' => 'Capital Federal'],
			
			['provincia_nombre' => 'Catamarca'],
			
			['provincia_nombre' => 'Chaco'],
			
			['provincia_nombre' => 'Chubut'],
			
			['provincia_nombre' => 'Córdoba'],
			
			['provincia_nombre' => 'Corrientes'],
			
			['provincia_nombre' => 'Entre Ríos'],
			
			['provincia_nombre' => 'Formosa'],
			
			['provincia_nombre' => 'Jujuy'],
			
			['provincia_nombre' => 'La Pampa'],
			
			['provincia_nombre' => 'La Rioja'],
			
			['provincia_nombre' => 'Mendoza'],
			
			['provincia_nombre' => 'Misiones'],
			
			['provincia_nombre' => 'Neuquén'],
			
			['provincia_nombre' => 'Río Negro'],
			
			['provincia_nombre' => 'Salta'],
			
			['provincia_nombre' => 'San Juan'],
			
			['provincia_nombre' => 'San Luis'],
			
			['provincia_nombre' => 'Santa Cruz'],
			
			['provincia_nombre' => 'Santa Fe'],
			
			['provincia_nombre' => 'Santiago del Estero'],
			
			['provincia_nombre' => 'Tierra del Fuego'],
			
			['provincia_nombre' => 'Tucumán'],

			['provincia_nombre' => 'Se desconoce']
		]);
    }
}
