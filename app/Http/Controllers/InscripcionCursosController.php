<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PreNuInscripcionCurso;
use App\Postulante;
use App\PreNuSolicitudCurso;
use Illuminate\Http\Request;

class InscripcionCursosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(Guard $auth){

		// esta lógica pertenece al usuario que coloca observaciones y ticks aceptados,
		// por el momento se dejará aca.
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$solicitud = PreNuSolicitudCurso::where('postulante',$postulante->id)->first();
		$detalle = $solicitud->detalleSolicitudCursosR()->get();
		foreach ($detalle as $item) {
			if($item->aceptado ==='si'){
				$inscripcion = PreNuInscripcionCurso::firstOrCreate(array('detalle_solicitud_curso'=>$item->id));
			}
		}

		return view('InscripcionCursos.index');
	}



	public function getCursosInscritosAceptados(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$cursosAceptados = PreNuInscripcionCurso::with('detalleSolicitudCursoR.asignaturaR')

							->wherehas('detalleSolicitudCursoR.preNuSolicitudCursoR', function($q) use ($postulante)
							{
							    $q->where('postulante', $postulante->id);

							})
							->get();

//$cursosAceptados = PreNuSolicitudCurso::with('detalleSolicitudCursosR')->where('postulante',9)->get();


	/*	$cursosAceptados = PreNuInscripcionCurso::with(array('detalleSolicitudCursoR'=>function($query){
        $query->select('solicitud_curso');
    }))->get();*/

		$arra = array('data'=>$cursosAceptados->toArray());
		return json_encode($arra);
	}


	public function postUpdate(Request $request,Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$numCursosAceptados = PreNuInscripcionCurso::

							wherehas('detalleSolicitudCursoR.preNuSolicitudCursoR', function($q) use ($postulante)
							{
							    $q->where('postulante', $postulante->id);

							})
							->get()->count();

		for ($i=0; $i < $numCursosAceptados; $i++) { 
			
			$curso = PreNuInscripcionCurso::findOrFail($request->get('id-inscripcion-'.$i));
			$curso->profesor = $request->get('profesor-'.$i);
			$curso->save();
	
		}
		return response()->json([
				'message'=> 'los datos se han alnacenado correctamente.'
				]);


	}

}
