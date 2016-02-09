<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ciudad;
use App\Continente;
use App\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\EditCiudadRequest;
use App\Http\Requests\CreateCiudadRequest;


class CiudadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function postCiudadByPais(Request $request){


	
		if($request->ajax()){
			return  Ciudad::where('pais',$request->get('idBuscar'))->orderBy('nombre')->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}


	public function postPaisByContinente(Request $request){


	
		if($request->ajax()){
			return  Pais::where('continente',$request->get('idBuscar'))->orderBy('nombre')->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}
	public function getIndex()
	{

		//$ciudades = Ciudad::;
		$ciudades = Ciudad::getAllRelation();


		return view('ciudades.index',compact('ciudades'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$continentes = Continente::lists('nombre','id');
		return view('ciudades.create',compact('continentes'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(CreateCiudadRequest $request)
	{


		 
		$ciudad = Ciudad::create($request->all());
		$message    = 'El continente '.$request->get('nombre').'se almacenó correctamente';
		\Session::flash('message', $message);

		return redirect('ciudades');
		//return redirect()->route('ciudades.index');
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
		$ciudad = Ciudad::getAllRelation($id);

		$continentes = Continente::lists('nombre','id');
		//$ciudad = Ciudad::where('id', '=', $id)->first();
	

        return view('ciudades.edit',compact('ciudad','continentes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id, EditCiudadRequest $request)
	{
		$this->validate($request, [
        'nombre' => 'required|unique:ciudad,nombre,'.$id,
        'pais' => 'required',
    	]);

		$ciudad = Ciudad::findOrFail($id);
		$ciudad->fill($request->all());
        $ciudad->save();
        \Session::flash('message', 'la ciudad se Editó correctamente');
		return redirect('ciudades');
        //return redirect()->route('ciudades.index');
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
		$ciudad = Ciudad::findOrFail($id);
 		$ciudad->delete();
 		$message = ' El ciudad '.$ciudad->nombre.' Fue eliminada';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);


		return redirect('ciudades');
		//return redirect()->route('ciudades.index');
	}

}
