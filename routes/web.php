<?php

Route::get('/', function () {
    return view('LoginUser');
});

Route::get('login',function () {
    return view('LoginUser');
})->name('login');

Route::post ('/verificar','LoginUsuarioController@LoginUsuario');
Route::get('/logout', 'LoginUsuarioController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::resource('oficinas','OficinaController')->middleware('auth');
Route::get('oficinas/{id}/destroy',[
    'uses' => 'OficinaController@destroy',
    'as' => 'oficinas.destroy'
])->middleware('auth');

Route::get('search','OficinaController@search')->middleware('auth')->name('search');

Route::resource('activos','ActivoController')->middleware('auth');
Route::get('activos/{id}/destroy',[
    'uses' => 'ActivoController@destroy',
    'as' => 'activos.destroy'
])->middleware('auth');
Route::resource('activosrev','ActivoRevController');
Route::get('activosrev/{id}/destroy',[
    'uses' => 'ActivoRevController@destroy',
    'as' => 'activosrev.destroy'
])->middleware('auth');
Route::resource('inventarios','InventarioController')->middleware('auth');
Route::get('getInvInfo/{id_ofi}','InventarioController@getInvInfo')->name('getInvInfo')->middleware('auth');
Route::get('inventarios/{id_inv}/destroy',[
    'uses' => 'InventarioController@destroy',
    'as' => 'inventarios.destroy'
])->middleware('auth');

Route::resource('invdetalles','InvenDetalleController')->middleware('auth');
Route::get('invdetalles/{id_inv_det}/destroy',[
    'uses' => 'InvenDetalleController@destroy',
    'as' => 'invdetalles.destroy'
])->middleware('auth');
Route::get('/continuar/{id_inv}/{inv_ofi_cod}','InvenDetalleController@continuar')->middleware('auth')->name('continuar');

Route::get('/pdf/{ofc_cod}', 'OficinaController@pdf')->middleware('auth')->name('pdf');
Route::get('/pdfInv/{inv_ofi_cod}', 'InventarioController@pdfInv')->middleware('auth')->name('pdfInv');
Route::get('generarQR/{criterioOficina}/{criterioActivo}', 'OficinaController@generarQR')->middleware('auth');
Route::get('generarQRC/{criterioOficinarev}/{criterioActivorev}', 'OficinaController@generarQRC')->middleware('auth');

Route::post('/import', 'OficinaController@import')->middleware('auth')->name('import');

