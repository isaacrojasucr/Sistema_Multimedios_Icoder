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

Route::resource('states/states', 'States\\statesController');
Route::resource('town/town', 'town\\townController');
Route::resource('edition/edition', 'edition\\editionController');
Route::resource('sport/sport', 'sport\\sportController');
Route::resource('category/category', 'category\\categoryController');
Route::resource('proof/proof', 'proofController');