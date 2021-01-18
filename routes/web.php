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
Route::get('/', 'LandingController@index')->name('home');

//kustomer
Route::get('login', 'UserController@login');
Route::post('signin', 'UserController@signin');
Route::get('register', 'UserController@register');
Route::post('signup', 'UserController@signup');

// admin
Route::get('loginAdmin', 'UserController@loginAdmin');
Route::post('signinAdmin', 'UserController@signinAdmin');
Route::get('registerAdmin', 'UserController@registerAdmin');
Route::post('signupAdmin', 'UserController@signupAdmin');


Route::get('landing/paket','LandingController@paket');
Route::get('landing/destinasi','LandingController@destinasi');

Route::get('landing/kontak', 'LandingController@kontak');


Route::middleware(['auth'])->group(function(){

    Route::middleware(['role:Admin'])->group(function(){
        // Admin
        Route::get('/destinasi','DestinasiController@index');
        Route::get('/destinasi/create','DestinasiController@create');
        Route::post('/destinasi/store','DestinasiController@store');
        Route::get('/destinasi/delete/{id}','DestinasiController@delete');
        Route::get('/destinasi/edit/{id}','DestinasiController@edit');
        Route::post('/destinasi/update/{id}','DestinasiController@update');

        Route::get('/paket','PaketController@index');
        Route::get('/paket/create','PaketController@create');
        Route::post('/paket/store','PaketController@store');
        Route::get('/paket/delete/{id}','PaketController@delete');
        Route::get('/paket/edit/{id}','PaketController@edit');
        Route::post('/paket/update/{id}','PaketController@update');

        Route::get('/transaksi','TransaksiController@index');
        Route::get('/transaksi/create','TransaksiController@create');
        Route::post('/transaksi/store','TransaksiController@store');
        Route::get('/transaksi/delete/{id}','TransaksiController@delete');
        Route::get('/transaksi/edit/{id}','TransaksiController@edit');
        Route::post('/transaksi/update/{id}','TransaksiController@update');
    });


    Route::get('landing/pemesananPaket/{id}','LandingController@pemesananPaket');
    Route::get('landing/pemesananDestinasi/{id}','LandingController@pemesananDestinasi');
    Route::post('landing/pemesanan/{id}','LandingController@pemesanan');
    
    Route::get('landing/pembayaran/{id}','LandingController@pembayaran');
    Route::post('landing/pembayaran/{id}','LandingController@buktiPembayaran');

    
    Route::get('landing/destinasi/{id}','LandingController@detailDestinasi');
    Route::get('landing/paket/{id}','LandingController@detailPaket');
    Route::get('landing/transaksi','LandingController@transaksi');

    
    
    Route::get('logout', 'UserController@logout');
});