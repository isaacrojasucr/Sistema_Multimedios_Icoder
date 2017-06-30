<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/json', 'inscription\\inscriptionController@cargarPorCedula');

Route::resource('states/states', 'States\\statesController');

Route::resource('town/town', 'town\\townController');

Route::resource('edition/edition', 'edition\\editionController');

Route::resource('sport/sport', 'sport\\sportController');

Route::resource('category/category', 'category\\categoryController');

Route::resource('person/person', 'person\\personController');

Route::resource('inscription/inscription', 'inscription\\inscriptionController');
Route::post('inscription/save', ['as'=>'inscription/save', 'uses'=>'inscription\\inscriptionController@save']);
Route::get('inscription/create/{id}/{name}',['as'=>'inscription/create', 'uses'=>'inscription\\inscriptionController@creation'] );

Route::resource('challenge/challenge', 'challenge\\challengeController');



Route::resource('padroncargar', 'padronController');
Route::post('postImportPadron', ['as'=>'postImportPadron', 'uses'=>'padronController@postImportPadron']);




Route::resource('inscriptionfile', 'inscription\\inscriptionfileController');


Route::get('getImport', 'inscription\\inscriptionfileController@getImport');





Route::post('postImport', ['as'=>'postImport', 'uses'=>'inscription\\inscriptionfileController@postImport']);

Route::get('inscriptionfile/{id}/edit', 'inscription\\inscriptionfileController@edit' );
Route::post('inscriptionfile/{id}/update', 'inscription\\inscriptionfileController@update' );
Route::post('inscriptionfile/{id}/delete2', 'inscription\\inscriptionfileController@delete2' );
Route::get('/listado', 'inscription\\inscriptionfileController@listado');
Route::get('inscriptionfile/{id}/destroy',[
    'uses' =>'inscription\\inscriptionfileController@destroy',
    'as'   =>'inscriptionfile.destroy'


]);


Route::post('editar', 'inscription\\inscriptionfileController@editar');

Route::get('guardar', 'inscription\\inscriptionfileController@guardar');




Route::get('/ajax-loadsport',function (){
    $id_sport =Input::get('id_sport');
    session('sport2',$id_sport);


});
