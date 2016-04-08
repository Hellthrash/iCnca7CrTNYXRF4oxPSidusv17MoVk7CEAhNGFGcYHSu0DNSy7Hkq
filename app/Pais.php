<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class Pais extends Model
{
    protected $table    = 'pais';
    public $timestamps  = false;
    protected $fillable = ['nombre','continente'];

    // un País esta en un Continente
    public function continenteR()
    {
        return $this->belongsTo('App\Continente','continente'); //id local
    }

    //un País tiene muchas Ciudades
    public function ciudades()
    {
        return $this->hasMany('App\Ciudad','pais','id'); // nombre del campo en la otra tabla 
    }

     public function universidadesR()
    {
        return $this->hasMany('App\Universidad','id'); // nombre del campo en la otra tabla 
    }
    public function getChildrenAttribute(){

        return$this->ciudades->count();
    }


    public function postulantesR(){

        return $this->hasManyThrough('App\Postulante', 'App\Ciudad', 'pais', 'ciudad');
    }


    public static function gCiudadesByPais(){

        $faker     = Faker::create();
        $paises = Pais::all();
        $total = [];

        foreach ($paises as $key => $value) {
            $temp = $value->ciudades->count();


            $total[] = array(
                'label'=> $value->nombre,
                'value'=>$temp,
                'color' => $faker->hexcolor);

        }

        return $total;
    }

    public static function gPostulantesByPais(){

        $faker     = Faker::create();
        $paises = Pais::all();
        $total = [];

        foreach ($paises as $key => $value) {
            $temp = $value->postulantesR->count();


            $total[] = array(
                'label'=> $value->nombre,
                'value'=>$temp,
                'color' => $faker->hexcolor);

        }

        return $total;
    }



}
