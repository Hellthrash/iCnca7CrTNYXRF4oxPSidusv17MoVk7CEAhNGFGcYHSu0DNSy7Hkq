<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Universidad;
use App\CampusSede;
use Illuminate\Http\Request;
use App\Continente;

class UniversidadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
 		return view('universidades.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getUniversidadCampus()
	{
		$universidades = Universidad::with('campusSedes.ciudad')->orderBy("id")->get();
		
		$arra = array('data'=>$universidades->toArray());
		return json_encode($arra);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{
		$universidad         = new Universidad();
		$universidadID = $universidad->insertGetId(array('nombre'=> $request->get('nombre_universidad')));

		$campus_sede = new CampusSede($request->all());
		$campus_sede->universidad = $universidadID;
		$campus_sede->ciudad = $request->get('ciudad');

		$campus_sede->save();

		return redirect('universidades');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getCreate()
	{
		$continentes = Continente::lists('nombre','id');
		return view('universidades.create',compact('continentes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
	//	$universidades = Universidad::with('campusSedes.ciudad')->orderBy("id")->get();
	//	$arra = array('data'=>$universidades->toArray());
//		dd(Universidad::getInformacionUniversidad($id));
//		return json_encode($universidades);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}