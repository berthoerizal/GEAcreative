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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
route::resource('profile', 'ProfileController');
Route::put('/update_password/{id}', ['as' => 'update_password', 'uses' => 'ProfileController@update_password']);
route::resource('user', 'UserController');
Route::get('/reset_password/{id}', ['as' => 'reset_password', 'uses' => 'UserController@reset_password']);
Route::resource('konfigurasi', 'KonfigurasiController');
Route::resource('layanan', 'LayananController');
Route::resource('detail', 'DetailController');
Route::resource('harga', 'PaketController');
Route::resource('galeri', 'GaleriController');
Route::resource('pesanan', 'PesananController');
Route::resource('photo', 'PhotoController');
