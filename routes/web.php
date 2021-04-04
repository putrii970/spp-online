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

//LOGIN
// hanya untuk tamu yg belum auth
Route::get('/login', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => ['auth:admin']], function(){
    Route::get('/', function() { return redirect('layouts/master'); });

    Route::get('/beranda', 'BerandaController@index');

    //KEJURUAN
    Route::get('/kejuruan', 'KejuruanController@index');
    Route::get('/kejuruan/create', 'KejuruanController@create');
    Route::post('/kejuruan', 'KejuruanController@store');
    Route::get('/kejuruan/edit/{id}', 'KejuruanController@edit');
    Route::put('/kejuruan/{id}', 'KejuruanController@update');
    Route::delete('/kejuruan/{id}/delete', 'KejuruanController@destroy');
    Route::get('/kejuruan/exportPdf', 'KejuruanController@exportPdf');

    //KELAS
    Route::get('/kelas', 'KelasController@index');
    Route::get('/kelas/create', 'KelasController@create');
    Route::post('/kelas', 'KelasController@store');
    Route::get('/kelas/edit/{id}', 'KelasController@edit');
    Route::put('/kelas/{id}', 'KelasController@update');
    Route::delete('/kelas/{id}/delete', 'KelasController@destroy');
    Route::get('/kelas/exportPdf', 'KelasController@exportPdf');

    //PETUGAS
    Route::get('/petugas', 'PetugasController@index');
    Route::get('/petugas/create', 'PetugasController@create');
    Route::post('/petugas', 'PetugasController@store');
    Route::get('/petugas/edit/{id}', 'PetugasController@edit');
    Route::put('/petugas/{id}', 'PetugasController@update');
    Route::delete('/petugas/{id}/delete', 'PetugasController@destroy');
    Route::get('/petugas/exportPdf', 'PetugasController@exportPdf');

    //SPP
    Route::get('/spp', 'SppController@index');
    Route::get('/spp/create', 'SppController@create');
    Route::post('/spp', 'SppController@store');
    Route::get('/spp/edit/{id}', 'SppController@edit');
    Route::put('/spp/{id}', 'SppController@update');
    Route::delete('/spp/{id}/delete', 'SppController@destroy');
    Route::get('/spp/exportPdf', 'SppController@exportPdf');

    //SISWA
    Route::get('/siswa', 'SiswaController@index');
    Route::get('/siswa/create', 'SiswaController@create');
    Route::post('/siswa', 'SiswaController@store');
    Route::get('/siswa/edit/{id}', 'SiswaController@edit');
    Route::put('/siswa/{id}', 'SiswaController@update');
    Route::delete('/siswa/{id}/delete', 'SiswaController@destroy');
    Route::get('/siswa/exportPdf', 'SiswaController@exportPdf');

    //PEMBAYARAN
    Route::get('/pembayaran', 'PembayaranController@index');
    Route::get('/pembayaran/create', 'PembayaranController@create');
    Route::post('/pembayaran', 'PembayaranController@store');
    Route::get('/pembayaran/edit/{id}', 'PembayaranController@edit');
    Route::put('/pembayaran/{id}', 'PembayaranController@update');
    Route::delete('/pembayaran/{id}/delete', 'PembayaranController@destroy');
    Route::get('/pembayaran/exportPdf', 'PembayaranController@exportPdf');

    //CARI PEMBAYARAN
    Route::get('/', 'PembayaranController@index');
    Route::get('/cari', 'PembayaranController@filterData')->name('pembayaran.filter');
    Route::post('/cari', 'PembayaranController@cari')->name('pembayaran.cari');

    //RIWAYAT
    Route::get('/riwayat', 'RiwayatController@index');
    Route::get('/riwayat/exportPdf', 'RiwayatController@exportPdf');

    //PENDAPATAN
    Route::get('/pendapatan', 'PendapatanController@index');
    Route::get('/pendapatan/filter', 'PendapatanController@filter')->name('pendapatan.filter');;
    Route::get('/pendapatan/exportPdf', 'PendapatanController@exportPdf');
    
});

    Route::get('/profilUser', 'LoginSiswaController@index');
    Route::get('/loginUser', 'LoginSiswaController@login');
    Route::post('/loginPost', 'LoginSiswaController@loginPost');
    Route::get('/logoutUser', 'LoginSiswaController@logout');

    Route::get('/kartuSppUser', 'KartuSppController@index');


?>