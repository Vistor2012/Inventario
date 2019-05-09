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

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('oficinas','OficinaController');
Route::get('oficinas/{id}/destroy',[
    'uses' => 'OficinaController@destroy',
    'as' => 'oficinas.destroy'
]);

Route::get('search','OficinaController@search')->name('search');

Route::resource('activos','ActivoController');
Route::get('activos/{id}/destroy',[
    'uses' => 'ActivoController@destroy',
    'as' => 'activos.destroy'
]);
Route::resource('activosrev','ActivoRevController');
Route::get('activosrev/{id}/destroy',[
    'uses' => 'ActivoRevController@destroy',
    'as' => 'activosrev.destroy'
]);
Route::resource('inventarios','InventarioController');
Route::get('inventarios/{id_inv}/destroy',[
    'uses' => 'InventarioController@destroy',
    'as' => 'inventarios.destroy'
]);

Route::resource('invdetalles','InvenDetalleController');
Route::get('invdetalles/{id_inv_det}/destroy',[
    'uses' => 'InvenDetalleController@destroy',
    'as' => 'invdetalles.destroy'
]);

Route::get('/pdf/{ofc_cod}', 'OficinaController@pdf');
Route::get('generarQR/{criterioOficina}/{criterioActivo}', 'OficinaController@generarQR');
Route::get('generarQRC/{criterioOficinarev}/{criterioActivorev}', 'OficinaController@generarQRC');

Route::post('/import', 'OficinaController@import')->name('import');
