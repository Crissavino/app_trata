<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//SEEDERS FORMULARIO A
        $this->call(AformulariosTableSeeder::class);
        $this->call(CaratulacionjudicialsTableSeeder::class);
        $this->call(EstadocasosTableSeeder::class);
        $this->call(ModalidadsTableSeeder::class);
        $this->call(OtrosorganismosTableSeeder::class);
        $this->call(PresentacionespontaneasTableSeeder::class);
        $this->call(ProfesionalactualmentesTableSeeder::class);
        $this->call(ProfesionalsTableSeeder::class);
        
        //SEEDERS FORMULARIO B
        $this->call(ArgciudadsTableSeeder::class);
        $this->call(ArgprovinciasTableSeeder::class);
        $this->call(BajoefectosTableSeeder::class);
        $this->call(BrestadosTableSeeder::class);
        $this->call(ChprovinciasTableSeeder::class);
        $this->call(DiscapacidadsTableSeeder::class);
        $this->call(EmbarazopreviosTableSeeder::class);
        $this->call(EmbarazorelevamientosTableSeeder::class);
        $this->call(EnfermedadcronicasTableSeeder::class);
        $this->call(FranjaetariasTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(HijosembarazosTableSeeder::class);
        $this->call(LesionconstatadasTableSeeder::class);
        $this->call(LimitacionsTableSeeder::class);
        $this->call(NiveleducativosTableSeeder::class);
        $this->call(OficiosTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(ResidenciaprecariasTableSeeder::class);
        $this->call(TienedocsTableSeeder::class);
        $this->call(TienelesionsTableSeeder::class);
        $this->call(TipodocumentosTableSeeder::class);
        $this->call(UrprovinciasTableSeeder::class);

    }
}
