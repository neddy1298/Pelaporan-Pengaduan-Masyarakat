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

// Auth::routes();

// Auth
Route::get('/login','AuthMasyarakat\LoginController@showLoginForm')->name('masyarakat.login');
Route::post('/login', 'AuthMasyarakat\LoginController@login')->name('masyarakat.login.submit');
Route::get('/logout', 'AuthMasyarakat\LoginController@logoutMasyarakat')->name('masyarakat.logout');
Route::get('/register', 'AuthMasyarakat\RegisterController@showRegisterForm')->name('masyarakat.register');
Route::post('/register/submit', 'AuthMasyarakat\RegisterController@register')->name('masyarakat.register.submit');
Route::get('/password/reset', 'AuthMasyarakat\ForgotPasswordController@showLinkRequestForm')->name('masyarakat.password.request');
Route::post('/password/email', 'AuthMasyarakat\ForgotPasswordController@sendResetLinkEmail')->name('masyarakat.password.email');
Route::get('/password/reset/{token}', 'AuthMasyarakat\ResetPasswordController@showResetForm')->name('masyarakat.password.reset');
Route::post('/password/reset', 'AuthMasyarakat\ResetPasswordController@reset');


Route::get('/', 'Masyarakat\HomeController@index')->name('masyarakat.dashboard');

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'Masyarakat\ProfileController@index')->name('masyarakat.profile');
    Route::post('/update/{nik}', 'Masyarakat\ProfileController@update')->name('masyarakat.profile.update');
});

Route::group(['prefix' => 'pengaduan'], function () {
    Route::get('/', 'Masyarakat\PengaduanController@index')->name('masyarakat.pengaduan.user');
    Route::get('/all', 'Masyarakat\PengaduanController@index2')->name('masyarakat.pengaduan');
    Route::get('/{id}', 'Masyarakat\PengaduanController@detail')->name('masyarakat.pengaduan.detail');
    Route::post('/submit', 'Masyarakat\PengaduanController@post')->name('masyarakat.pengaduan.submit');
    Route::post('/search', 'Masyarakat\PengaduanController@search')->name('masyarakat.pengaduan.search');

});


// Admin
Route::prefix('admin')->group(function() {
    // Auth
    Route::get('/', 'Petugas\HomeController@index')->name('petugas.dashboard');
    Route::get('/login','AuthPetugas\LoginController@showLoginForm')->name('petugas.login');
    Route::post('/login', 'AuthPetugas\LoginController@login')->name('petugas.login.submit');
    Route::get('logout/', 'AuthPetugas\LoginController@logoutPetugas')->name('petugas.logout');
    Route::get('/password/reset', 'AuthPetugas\ForgotPasswordController@showLinkRequestForm')->name('petugas.password.request');
    Route::post('/password/email', 'AuthPetugas\ForgotPasswordController@sendResetLinkEmail')->name('petugas.password.email');
    Route::get('/password/reset/{token}', 'AuthPetugas\ResetPasswordController@showResetForm')->name('petugas.password.reset');
    Route::post('/password/reset', 'AuthPetugas\ResetPasswordController@reset');

    // Pengaduan
    Route::group(['prefix' => 'pengaduan'], function () {
        Route::get('/', 'Petugas\PengaduanController@index')->name('petugas.pengaduan');
        Route::get('/show/{custome}', 'Petugas\PengaduanController@index2')->name('petugas.pengaduan.custome');
        Route::get('/{id}', 'Petugas\PengaduanController@detail')->name('petugas.pengaduan.detail');
        Route::post('/{id}/update', 'Petugas\PengaduanController@update')->name('petugas.pengaduan.update');
        Route::post('/search', 'Petugas\PengaduanController@search')->name('petugas.pengaduan.search');
    });

    // PDF
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'Petugas\PengaduanController@report')->name('petugas.report');
        Route::get('/{id}', 'Petugas\PengaduanController@reportSatu')->name('petugas.report.satu');
    });

    // Tanggapan
    Route::group(['prefix' => 'tanggapan'], function () {
        Route::get('/', 'Petugas\TanggapanController@index')->name('petugas.tanggapan');
        Route::get('/show/{custome}', 'Petugas\TanggapanController@index2')->name('petugas.tanggapan.custome');
        Route::get('/{id}', 'Petugas\TanggapanController@detail')->name('petugas.tanggapan.detail');
        Route::post('/create', 'Petugas\TanggapanController@store')->name('petugas.tanggapan.create');
        Route::post('/search', 'Petugas\TanggapanController@search')->name('petugas.tanggapan.search');
    });

    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Petugas\MasyarakatController@index')->name('petugas.user');
        Route::get('/{id}', 'Petugas\MasyarakatController@detail')->name('petugas.user.detail');
        Route::post('/search', 'Petugas\MasyarakatController@search')->name('petugas.user.search');
    });

    // Petugas
    Route::group(['prefix' => 'petugas'], function () {
        Route::get('/', 'Petugas\PetugasController@index')->name('petugas.admin');
        Route::get('/{id}', 'Petugas\PetugasController@detail')->name('petugas.admin.detail');
        Route::post('/search', 'Petugas\PetugasController@search')->name('petugas.admin.search');
    });

    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'Petugas\PetugasController@profile')->name('petugas.profile');
        Route::post('/update/{id}', 'Petugas\PetugasController@update')->name('petugas.update');
    });
}) ;

