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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('petugas')->group(function() {
    Route::get('/login','AuthPetugas\LoginController@showLoginForm')->name('petugas.login');
    Route::post('/login', 'AuthPetugas\LoginController@login')->name('petugas.login.submit');
    Route::get('logout/', 'AuthPetugas\LoginController@logoutPetugas')->name('petugas.logout');
    Route::get('/', 'PetugasController@index')->name('petugas.dashboard');
   }) ;

Route::prefix('masyarakat')->group(function() {
    Route::get('/login','AuthMasyarakat\LoginController@showLoginForm')->name('masyarakat.login');
    Route::post('/login', 'AuthMasyarakat\LoginController@login')->name('masyarakat.login.submit');
    Route::get('logout/', 'AuthMasyarakat\LoginController@logoutMasyarakat')->name('masyarakat.logout');
    Route::get('/', 'MasyarakatController@index')->name('masyarakat.dashboard');
   }) ;
