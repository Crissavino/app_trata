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

        //SEEDERS FORMULARIO C
        $this->call(OtraspersonasTableSeeder::class);
        $this->call(VinculosTableSeeder::class);

        //SEEDERS FORMULARIO D
        $this->call(CalificaciongeneralsTableSeeder::class);
        $this->call(CalificacionespecificasTableSeeder::class);
        $this->call(FinalidadsTableSeeder::class);
        $this->call(ActividadsTableSeeder::class);
        $this->call(PrivadosTableSeeder::class);
        $this->call(TextilsTableSeeder::class);
        $this->call(RuralsTableSeeder::class);
        $this->call(ContactoexplotacionsTableSeeder::class);
        $this->call(ViajosTableSeeder::class);
        $this->call(AcompanadosTableSeeder::class);
        $this->call(AcompanadoredsTableSeeder::class);
        $this->call(ResidelugarsTableSeeder::class);
        $this->call(EnganosTableSeeder::class);
        $this->call(HaypersonasTableSeeder::class);
        $this->call(TipovictimasTableSeeder::class);
        $this->call(FrecuenciapagosTableSeeder::class);
        $this->call(ModalidadpagosTableSeeder::class);
        $this->call(EspeciaconceptosTableSeeder::class);
        $this->call(DeudasTableSeeder::class);
        $this->call(MotivodeudasTableSeeder::class);
        $this->call(LugardeudasTableSeeder::class);
        $this->call(PermanenciasTableSeeder::class);
        $this->call(TestigosTableSeeder::class);
        $this->call(HaycorrientesTableSeeder::class);
        $this->call(HaygasTableSeeder::class);
        $this->call(HaymedidasTableSeeder::class);
        $this->call(HayhacinamientosTableSeeder::class);
        $this->call(HayaguasTableSeeder::class);
        $this->call(HaybanosTableSeeder::class);
        $this->call(CuantosbanosTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(ElementotrabajosTableSeeder::class);
        $this->call(ElementoseguridadsTableSeeder::class);

        //SEEDERS FORMULARIO E
        $this->call(RoldelitosTableSeeder::class);
        $this->call(EdocumentosTableSeeder::class);
        $this->call(VinculacionsTableSeeder::class);

        //SEEDERS FORMULARIO F
        $this->call(OrgjudicialsTableSeeder::class);
        $this->call(OrgprognacionalsTableSeeder::class);
        $this->call(PoliciaTableSeeder::class);
        $this->call(OrgjudicialactualmentesTableSeeder::class);
        $this->call(OrgprognacionalactualmentesTableSeeder::class);
        $this->call(PoliciaactualmentesTableSeeder::class);
        $this->call(AsistenciaTableSeeder::class);
        $this->call(SocioeconomicsTableSeeder::class);

        //SEEDERS FORMULARIO G
        $this->call(TemaintervencionsTableSeeder::class);
        
    }
}
