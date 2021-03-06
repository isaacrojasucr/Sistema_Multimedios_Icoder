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

Route::post('ajaxloadsport/setid/{name}', 'inscription\\inscriptionfileController@changeSport');

//inscription group
Route::resource('inscriptiongroup', 'inscription\\inscriptiongroupController');

Route::post('inscriptiongroup/{id}/update', 'inscription\\inscriptiongroupController@update' );

Route::get('inscriptiongroup/{id}/destroy',[
    'uses' =>'inscription\\inscriptiongroupController@destroy',
    'as'   =>'inscriptiongroup.destroy'
]);

Route::get('createinscription', 'inscription\\inscriptiongroupController@createinscription');


Route::post('ajaxloadsportgrup/setid/{name}', 'inscription\\inscriptiongroupController@changeSport');

Route::get('inscriptiongroup/deletegroup/{id}',['as'=>'inscriptiongroup/deletegroup', 'uses'=>'inscription\\inscriptiongroupController@deletegroup']);

Route::get('inscriptiongroup/inscribir/{id}',['as'=>'inscriptiongroup/inscribir', 'uses'=>'inscription\\inscriptiongroupController@inscribir']);
Route::post('inscriptiongroup/{id}/edit33', 'inscription\\inscriptionfileController@editagroup' );
Route::get('inscriptiongroup/getPDF/{id}',['as'=>'inscriptiongroup/getPDF', 'uses'=>'inscription\\inscriptiongroupController@getPDF']);


Route::get('buscarcedula/cedula/{name}', 'inscription\\inscriptiongroupController@buscarcedula');


Route::get('inscription/inscribir/{id}',['as'=>'inscription/inscribir', 'uses'=>'inscription\\inscriptionController@inscribir'] );

Route::get('inscription/cancelarProceso/{id}',['as'=>'inscription/cancelarProceso', 'uses'=>'inscription\\inscriptionController@cancelarProceso']);





