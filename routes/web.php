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

Auth::routes();

// Admin Routes
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
        // sponsor page 
        Route::get('/apartments/sponsor/{slug}', 'ApartmentController@sponsor')->name('apartments.sponsor');
        // sponsor payment page 
        Route::get('/apartments/sponsor/payment/{slug}', 'PaymentController@index')->name('apartments.sponsor.payment');
        Route::post('/apartments/sponsor/checkout/{slug}', 'PaymentController@checkout')->name('apartments.sponsor.checkout');
        // stats page 
        Route::get('/apartments/stats/{slug}', 'ApartmentController@viewStats')->name('apartments.stats');
        // CRUD apartments 
        Route::resource('/apartments', 'ApartmentController');
        // CRUD messages 
        Route::resource('/messages', 'LeadController');
     });


//  vue routes     
Route::get('/', 'HomeController@vue')->name('vue.home');
Route::get('/{any}', 'HomeController@vue')->where('any', '.*')->name('vue');
