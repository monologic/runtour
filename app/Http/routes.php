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

Route::get('/', function () {
    return view('index.home');
});
Route::get('/registro', function () {
    return view('index.registro');
});
Route::get('/mapa', function () {
    return view('index.mapa');
});
Route::get('/negocios', function () {
    return view('index.negocios');
});
Route::get('/contacto', function () {
    return view('index.contacto');
 });
Route::post('addempresa', 'EmpresaController@store');
Route::get('allmarker/{pais}/{ciudad}', 'EmpresaController@negocios');
Route::get('negocios/{pais}/{ciudad}', 'EmpresaController@negocios');
Route::get('paices', 'paisController@allpaices');
Route::post('addDataSession', 'EmpresaController@addDataSession');
Route::get('getDataSession', 'EmpresaController@getDataSession');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=> 'admin', 'middleware' => [ 'auth', 'web' ]], function(){
	Route::get('/', function () {
	    return view('welcome');
	});
});


