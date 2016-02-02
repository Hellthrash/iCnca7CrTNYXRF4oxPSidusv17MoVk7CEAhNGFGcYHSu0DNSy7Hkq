<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistente;
use App\PreUach;
use App\Postulante;
use App\Ciudad;
use App\Beneficio;
use App\DetalleBeneficio;

class AsistentesController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getPrueba()
	{
//		$var = Postulante::with('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->has('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->get();
		//$var = Postulante::with('pregradosR')->get();
//		$arra = array('data'=>$var->toArray());
//		return $var->toJson();
		//return json_encode($arra);
		return view('asistentes.prueba');
	}

	public function getIndex()
	{

		$asistentes = Postulante::with('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->has('pregradosR.preUachsR.asistentesR')->get();
		return view('asistentes.index', compact('asistentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('beneficios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{

		/* $this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
    	]);*/
		 
		$beneficio = Asistente::create($request->all());
		$message    = 'El beneficio '.$request->get('nombre').'se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('beneficios.index');
		return redirect('beneficios');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$asistentes = Asistente::findOrFail($id);
		$post = Postulante::findOrFail($asistentes->postulante);
		//dd($asistentes->toArray());
		$detalle = DetalleBeneficio::where('id_a','=',$asistentes->id)->get();
		$beneficios = Beneficio::lists('nombre','id');
		//dd($beneficios);
        return view('asistentes.edit',compact('asistentes','detalle','post','beneficios'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id,Request $request)
	{
		/*$this->validate($request, [
        'nombre' => 'required|string|unique:asistente,nombre,'.$id,
    	]);*/ // el nombre del asistente no se edita. no es operable ni estadistico 
		$asistentes = Asistente::findOrFail($id);
		$asistentes->fill($request->all());
        $asistentes->save();
        \Session::flash('message', 'El Asistente se Editó correctamente');
		return redirect('asistentes');
        //return redirect()->route('beneficios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id,Request $request)
	{
		//abort(500);
		$beneficio = Asistente::findOrFail($id);
 		$beneficio->delete();
 		$message = ' El beneficio '.$beneficio->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('beneficios');

		//return redirect()->route('beneficios.index');
	}

	public function deleteDestroyBenef($id,Request $request)
	{
		dd('entre al nuevo action para eliminar beneficio');
	}

}