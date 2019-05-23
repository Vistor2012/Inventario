<?php

Route::get('/', function () {
    return view('LoginUser');
});
Route::post ('/verificar','LoginUsuarioController@LoginUsuario');

Route::get('/home', 'HomeController@index')->name('home');

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
Route::get('getInvInfo/{id_ofi}','InventarioController@getInvInfo')->name('getInvInfo');
Route::get('inventarios/{id_inv}/destroy',[
    'uses' => 'InventarioController@destroy',
    'as' => 'inventarios.destroy'
]);

Route::resource('invdetalles','InvenDetalleController');
Route::get('invdetalles/{id_inv_det}/destroy',[
    'uses' => 'InvenDetalleController@destroy',
    'as' => 'invdetalles.destroy'
]);

Route::get('/pdf/{ofc_cod}', 'OficinaController@pdf')->name('pdf');
Route::get('/pdfInv/{inv_ofi_cod}', 'InventarioController@pdfInv')->name('pdfInv');
Route::get('generarQR/{criterioOficina}/{criterioActivo}', 'OficinaController@generarQR');
Route::get('generarQRC/{criterioOficinarev}/{criterioActivorev}', 'OficinaController@generarQRC');

Route::post('/import', 'OficinaController@import')->name('import');

