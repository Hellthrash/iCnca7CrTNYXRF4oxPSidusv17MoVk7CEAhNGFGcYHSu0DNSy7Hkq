<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'admin'],function(){

	//Route::resource('users','UsersController');
	Route::resource('usuarios','UsuariosController');

});


Route::group(['prefix'=>'continentes'],function(){

	Route::get('/',array('uses' => 'ContinentesController@index', 'as'=>'continentes.index'));
	Route::get('create',array('uses' => 'ContinentesController@create', 'as'=>'continentes.create'));
	Route::post('store',array('uses' => 'ContinentesController@store', 'as'=>'continentes.store'));
	Route::get('edit/{id}',array('uses' => 'ContinentesController@edit', 'as' => 'continentes.edit'));
	Route::put('update/{id}',array('uses' => 'ContinentesController@update', 'as' => 'continentes.update'));
	Route::delete('destroy({id}',array('uses' => 'ContinentesController@destroy', 'as'=> 'continentes.destroy'));



});


Route::group(['prefix'=>'paises'],function(){

	Route::get('/',array('uses' => 'PaisesController@index', 'as'=>'paises.index'));
	Route::get('create',array('uses' => 'PaisesController@create', 'as'=>'paises.create'));
	Route::post('store',array('uses' => 'PaisesController@store', 'as'=>'paises.store'));
	Route::get('edit/{id}',array('uses' => 'PaisesController@edit', 'as' => 'paises.edit'));
	Route::put('update/{id}',array('uses' => 'PaisesController@update', 'as' => 'paises.update'));
	Route::delete('destroy({id}',array('uses' => 'PaisesController@destroy', 'as'=> 'paises.destroy'));



});
