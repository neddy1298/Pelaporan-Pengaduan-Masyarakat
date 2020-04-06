<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('masyarakat')->group(function() {
    Route::get('/', 'MasyarakatController@index')->name('masyarakat.dashboard');
    Route::get('/login','AuthMasyarakat\LoginController@showLoginForm')->name('masyarakat.login');
    Route::post('/login', 'AuthMasyarakat\LoginController@login')->name('masyarakat.login.submit');
    Route::get('/logout', 'AuthMasyarakat\LoginController@logoutMasyarakat')->name('masyarakat.logout');
    Route::get('/password/reset', 'AuthMasyarakat\ForgotPasswordController@showLinkRequestForm')->name('masyarakat.password.request');
    Route::post('/password/email', 'AuthMasyarakat\ForgotPasswordController@sendResetLinkEmail')->name('masyarakat.password.email');
    Route::get('/password/reset/{token}', 'AuthMasyarakat\ResetPasswordController@showResetForm')->name('masyarakat.password.reset');
    Route::post('/password/reset', 'AuthMasyarakat\ResetPasswordController@reset');
}) ;

Route::prefix('admin')->group(function() {
    Route::get('/', 'Petugas\HomeController@index')->name('petugas.dashboard');
    Route::get('/login','AuthPetugas\LoginController@showLoginForm')->name('petugas.login');
    Route::post('/login', 'AuthPetugas\LoginController@login')->name('petugas.login.submit');
    Route::get('logout/', 'AuthPetugas\LoginController@logoutPetugas')->name('petugas.logout');
    Route::get('/password/reset', 'AuthPetugas\ForgotPasswordController@showLinkRequestForm')->name('petugas.password.request');
    Route::post('/password/email', 'AuthPetugas\ForgotPasswordController@sendResetLinkEmail')->name('petugas.password.email');
    Route::get('/password/reset/{token}', 'AuthPetugas\ResetPasswordController@showResetForm')->name('petugas.password.reset');
    Route::post('/password/reset', 'AuthPetugas\ResetPasswordController@reset');

    // Admin Pengaduan
    Route::group(['prefix' => 'pengaduan'], function () {
        Route::get('/', 'Petugas\PengaduanController@index')->name('petugas.pengaduan');
        Route::get('/show/{custome}', 'Petugas\PengaduanController@index2')->name('petugas.pengaduan.custome');
        Route::get('/{id}', 'Petugas\PengaduanController@detail')->name('petugas.pengaduan.detail');
        Route::post('/{id}/update', 'Petugas\PengaduanController@update')->name('petugas.pengaduan.update');
        Route::get('/search', 'Petugas\PengaduanController@search')->name('petugas.pengaduan.search');
    });

    // Admin Tanggapan
    Route::group(['prefix' => 'tanggapan'], function () {
        Route::get('/', 'Petugas\TanggapanController@index')->name('petugas.tanggapan');
        Route::get('/show/{custome}', 'Petugas\TanggapanController@index2')->name('petugas.tanggapan.custome');
        Route::get('/{id}', 'Petugas\TanggapanController@detail')->name('petugas.tanggapan.detail');
        Route::post('/create', 'Petugas\TanggapanController@store')->name('petugas.tanggapan.create');
        Route::get('/search', 'Petugas\TanggapanController@search')->name('petugas.tanggapan.search');
    });
}) ;
