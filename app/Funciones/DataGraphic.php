<?php namespace App\Funciones;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Postulante;
use App\Genero;
use App\TipoEstudio;
use App\Pregrado;
use App\Procedencia;
use App\Universidad;
use Illuminate\Support\Collection ;
class DataGraphic
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function recursiva($table,$id,$tipo,$sexo)
    {   
        $temp = array();
        switch ($table) {
            case 'continente':
                $temp = Continente::all();
                $table = 'pais';
                # code...
                break;
            case 'pais':
                $temp = Pais::where('continente',$id)->get();
                $table = 'ciudad';
                break;
            case 'ciudad':
                $temp = Ciudad::where('pais',$id)->get();
                $table = 'genero';
                $sexo = "m";

                break;
            case 'genero':
                $temp = Genero::all();
                $table = 'tipo_estudio';
                $sexo = "f";
                break;
            case 'tipo_estudio':
                $temp = TipoEstudio::all();
                $table = 'procedencia';
                break;
            case 'procedencia':

                $temp = Procedencia::all();
                $table = 'fin';
                break;

        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {
            $padre = $valor->id;
            switch ($table) {
                case 'tipo_estudio':
                    $children = $valor->postulanteR->where("ciudad",$id)->count();
                    $nombre = $valor->nombre;
                    $padre = $id;
                    $sexo = $valor->id;
                    break;
                case 'procedencia':
                    $children = $valor->postulanteR->where("ciudad",$id)->where("sexo",$sexo)->count();
                    //dd($valor->postulanteR->where("ciudad",1)->where("sexo",$sexo));
                    $tipo = $valor->id;
                    $nombre = $valor->nombre;
                    $sexo = $sexo;
                    $padre = $id;
                    break;
                case 'fisn':

                    break;
                default:
                    # code...
                    $children = $valor->children;
                    $nombre = $valor->nombre;
                    break;
            }

            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'size'=> $children,
                                'children' =>  $this->recursiva($table,$padre,$tipo,$sexo)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }




    public function recursiva_universidad($table,$id,$nombre){   
        $temp = array();
        switch ($table) {
            case 'continente':
                $temp = Continente::all();
                $table = 'pais';
                # code...
                break;
            case 'pais':
                $temp = Pais::where('continente',$id)->get();
                $table = 'Convenio';
                # code...
                break;
            case 'Convenio':
                $temp  = Collection::make([["nombre"=>"Si"],["nombre"=>"No"]]);
                $table = 'Universidad';
                # code...
                break;
            case 'Universidad':
                $temp  = Universidad::where('pais',$id)->where('convenio',$nombre)->get();
                $table = 'fin';
              
                # code...
                break;
            
        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {
            switch ($table) {
                case 'Universidad':
                    $nombre = $temp->toArray()[$key]["nombre"];
                    # code...
                    $padre = $id;
                    $children  = Universidad::where('pais',$padre)->where('convenio',$nombre)->count();
                    break;
                
                default:
                    # code...
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->childrenUniversidad;
                    break;
            }
            
            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'size'=> $children,
                                'children' =>  $this->recursiva_universidad($table,$padre,$nombre)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }

    public function recursiva_estudio($table,$id){   
        $temp = array();
        switch ($table) {
            case 'tipo_estudio':
                $temp = TipoEstudio::all();
                $table = 'procedencia';
                break;
            case 'procedencia':
                $temp = Procedencia::all();
                $table = 'fin';
           
                break;
            
            
        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {
            switch ($id) {
                case 'Postgrado':
                    # code...

                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->postgradoR->count();
                    break;
                case 'Pregrado':
                    # code...
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->pregradoR->count();
                    break;
                
                default:
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->postulanteR->count();
                    break;
            }
            
            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'size'=> $children,
                                'children' =>  $this->recursiva_estudio($table,$padre)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }
}