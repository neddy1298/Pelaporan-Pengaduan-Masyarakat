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
    Route::get('/login','Auth\PetugasLoginController@showLoginForm')->name('petugas.login');
    Route::post('/login', 'Auth\PetugasLoginController@login')->name('petugas.login.submit');
    Route::get('logout/', 'Auth\PetugasLoginController@logoutPetugas')->name('petugas.logout');
    Route::get('/', 'PetugasController@index')->name('petugas.dashboard');
   }) ;

Route::prefix('masyarakat')->group(function() {
    Route::get('/login','Auth\MasyarakatLoginController@showLoginForm')->name('masyarakat.login');
    Route::post('/login', 'Auth\MasyarakatLoginController@login')->name('masyarakat.login.submit');
    Route::get('logout/', 'Auth\MasyarakatLoginController@logoutMasyarakat')->name('masyarakat.logout');
    Route::get('/', 'MasyarakatController@index')->name('masyarakat.dashboard');
   }) ;
