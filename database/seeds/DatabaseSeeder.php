<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {






       //###########################################
/*
*/
       $this->call(UserTableSeeder::class);
       $this->call(ContinenteTableSeeder::class);
       $this->call(PaisTableSeeder::class);
       $this->call(CiudadTableSeeder::class); // deben entregarnos esta información.

       //###########################################
       $this->call(UniversidadTableSeeder::class);

       $this->call(CampusSedeTableSeeder::class);
       $this->call(ConvenioTableSeeder::class);

        //###########################################
        $this->call(DepartamentoTableSeeder::class); // deben entregarnos esta información.
        $this->call(FacultadTableSeeder::class);
        $this->call(CarreraTableSeeder::class);
        $this->call(AsignaturaTableSeeder::class); 

        $this->call(GeneroTableSeeder::class);
        $this->call(TipoEstudioSeeder::class);
        $this->call(ProcedenciasTableSeeder::class);
        $this->call(AnioIntercambioTableSeeder::class);

       


       //########################################### seed falsos 
       $this->call(PostulanteTableSeeder::class);
       $this->call(DocumentoIdentidadTableSeeder::class);
       $this->call(DocumentoAdjuntoTableSeeder::class);

      //###########################################
       $this->call(FinanciamientoTableSeeder::class);
       $this->call(PostgradoTableSeeder::class);
       $this->call(PostOtroFinanciamientoTableSeeder::class);


       //###########################################
       $this->call(PregradoTableSeeder::class);
       $this->call(MaestriaActualTableSeeder::class);





       //###########################################
        $this->call(ProcedenciaPregradoTableSeeder::class);
        $this->call(PreUResponsableTableSeeder::class);

        $this->call(HomologacionTableSeeder::class);
        $this->call(AsignaturaHomologadaTableSeeder::class);
        $this->call(BeneficioTableSeeder::class);
        $this->call(AsistenteTableSeeder::class);
        $this->call(DetalleBeneficioTableSeeder::class);
        $this->call(CindaTableSeeder::class);


       //###########################################
        $this->call(ConfirmacionLlegadaTableSeeder::class);
        $this->call(ContactoExtranjeroTableSeeder::class);
        $this->call(DeclaracionTableSeeder::class);

       //###########################################
        $this->call(PreNuSolicitudCursoTableSeeder::class);
        $this->call(DetalleSolicitudCursoTableSeeder::class);
        $this->call(PrePostulacionUniversidadTableSeeder::class);

       //###########################################
        $this->call(PreOtroFinanciamientoTableSeeder::class);
        $this->call(PreNuEstudioActualTableSeeder::class);
        $this->call(PreNuInscripcionCursoTableSeeder::class);
        $this->call(PreUEstudioActualTableSeeder::class);
        $this->call(PostPostulacionUniverisidadTableSeeder::class);

        $this->call(TopicTableSeeder::class);
        $this->call(ConversationsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);


        // hasta aca optimicé! 

        
        
        

        //###########################################
        //Segunda etapa
        //###########################################
        
        $this->call(AlojamientoTableSeeder::class);
        $this->call(NoticiaTableSeeder::class);
        $this->call(TestimonioTableSeeder::class);
        $this->call(CorreoTableSeeder::class);













    }
}
