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
    return view('layouts.master');
});

// MASTER

// Route::resource('/kejuruan', 'KejuruanController');
Route::get('/beranda', 'BerandaController@index');

//KEJURUAN
Route::get('/kejuruan', 'KejuruanController@index');
Route::get('/kejuruan/create', 'KejuruanController@create');
Route::post('/kejuruan', 'KejuruanController@store');
Route::get('/kejuruan/edit/{id}', 'KejuruanController@edit');
Route::put('/kejuruan/{id}', 'KejuruanController@update');
Route::delete('/kejuruan/{id}/delete', 'KejuruanController@destroy');

//KELAS
Route::get('/kelas', 'KelasController@index');
Route::get('/kelas/create', 'KelasController@create');
Route::post('/kelas', 'KelasController@store');
Route::get('/kelas/edit/{id}', 'KelasController@edit');
Route::put('/kelas/{id}', 'KelasController@update');
Route::delete('/kelas/{id}/delete', 'KelasController@destroy');

//PETUGAS
Route::get('/petugas', 'PetugasController@index');
Route::get('/petugas/create', 'PetugasController@create');
Route::post('/petugas', 'PetugasController@store');
Route::get('/petugas/edit/{id}', 'PetugasController@edit');
Route::put('/petugas/{id}', 'PetugasController@update');
Route::delete('/petugas/{id}/delete', 'PetugasController@destroy');

//SPP
Route::get('/spp', 'SppController@index');
Route::get('/spp/create', 'SppController@create');
Route::post('/spp', 'SppController@store');
Route::get('/spp/edit/{id}', 'SppController@edit');
Route::put('/spp/{id}', 'SppController@update');
Route::delete('/spp/{id}/delete', 'SppController@destroy');



