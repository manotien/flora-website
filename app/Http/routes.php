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

//Route::get('/', function () {
  //  return view('welcome');});
Route::get('export','ExportController@index');
Route::post('export','ExportController@store');
Route::get('/','IndexController@index');
Route::get('location/{id}','LocationController@index');


Route::post('create/location','LocationController@store');
Route::post('create/flora','FloraController@store');
Route::get('location/{id}/flora/{id2}','FloraController@index'); 

Route::post('create/photo','FloraController@storephoto');

Route::auth();

Route::get('/home', 'HomeController@index');
