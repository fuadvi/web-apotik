<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomepageController@index');

Route::prefix('admin2')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'dashboard@index')
            ->name('dashboard');
        Route::get('/user', 'ControllerUser@index')
            ->name('user');

        Route::resource('pasien', 'ControllerPasien');
        Route::resource('obat', 'ControllerObat');
        Route::resource('obat_masuk', 'ControllerObatMasuk');
        Route::resource('dokter', 'ControllerDokter');
        Route::resource('resep', 'ControllerResep');
        Route::resource('kasir', 'ControllerKasir');



        Route::get('/admin2/resep/details', 'ControllerResep@details')
            ->name('resep_details');

        Route::get('/resep/racik/{$id}', 'ControllerResep@create')
            ->name('racik');

        Route::get('/detail/{slug}', 'ControllerResep@detailPasien')
            ->name('resep_PasienDetail');

        Route::post('/resep/racik', 'ControllerResep@proses')
            ->name('proses_racik');

        Route::get('/admin2/obat/cari', 'ControllerObat@cari')
            ->name('cari');

        Route::get('/admin2/obat_masuk/cari', 'ControllerObatMasuk@cari')
            ->name('cari_obatmasuk');

        Route::get('/admin2/pasien/cari', 'ControllerPasien@cari')
            ->name('cari_pasien');

        Route::get('/admin2/dokter/cari', 'ControllerDokter@cari')
            ->name('cari_dokter');

        Route::get('/admin2/resep/cari', 'ControllerResep@cari')
            ->name('cari_resep');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
