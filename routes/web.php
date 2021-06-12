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
Route::get('/anggota', 'AnggotaController@index');
Route::post('/anggota', 'AnggotaController@store');
Route::get('anggota/create', 'AnggotaController@create');
Route::get('anggota/{anggota}','AnggotaController@show');
Route::get('anggota/{anggota}/edit', 'AnggotaController@edit');
Route::post('anggota/{anggota}/update', 'AnggotaController@update');
Route::get('anggota/{anggota}/delete', 'AnggotaController@destroy');
Route::get('/anggota/cetakpdf', 'AnggotaController@cetak');

Route::get('/pegawai', 'PegawaiController@index');
Route::post('/pegawai', 'PegawaiController@store');
Route::get('pegawai/create', 'PegawaiController@create');
Route::get('pegawai/{pegawai}','PegawaiController@show');
Route::get('pegawai/{pegawai}/edit', 'PegawaiController@edit');
Route::post('pegawai/{pegawai}/update', 'PegawaiController@update');
Route::get('pegawai/{pegawai}/delete', 'PegawaiController@destroy');
Route::get('cetak/cetakpegawai', 'PegawaiController@cetak');

Route::get('/buku', 'BukuController@index');
Route::post('/buku', 'BukuController@store');
Route::get('buku/create', 'BukuController@create');
Route::get('buku/{buku}','BukuController@show');
Route::get('buku/{buku}/edit', 'BukuController@edit');
Route::post('buku/{buku}/update', 'BukuController@update');
Route::get('buku/{buku}/delete', 'BukuController@destroy');

Route::get('/peminjaman', 'PeminjamanController@index');
Route::post('/peminjaman', 'PeminjamanController@store');
Route::get('peminjaman/create', 'PeminjamanController@create');
Route::get('peminjaman/{peminjaman}','PeminjamanController@show');
Route::post('peminjaman/{peminjaman}/update', 'PeminjamanController@update');
Route::get('cetak/cetakpeminjaman', 'PeminjamanController@cetak');


Route::get('/form-kembalipeminjaman{peminjaman}', 'PeminjamanController@form_kembali');
Route::get('/kembalipeminjaman{peminjaman}', 'PeminjamanController@update');
Route::post('/kembalipeminjaman{peminjaman}', 'PeminjamanController@update');

Route::get('peminjaman/{peminjaman}/delete', 'PeminjamanController@destroy');

// Route::get('/pengembalian', 'PengembalianController@index');
// Route::post('/pengembalian', 'PengembalianController@store');
// Route::get('pengembalian/create', 'PengembalianController@create');
// Route::get('pengembalian/{pengembalian}','PengembalianController@show');
// Route::post('pengembalian/{pengembalian}/update', 'PengembalianController@update');
//
// Route::get('form-kembalipeminjaman')
//
// Route::get('pengembalian/{pengembalian}/delete', 'PengembalianController@destroy');

Route::post('/jabar', 'PeminjamanController@jabar')->name('jabar');

Route::get('/index','PageController@home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
