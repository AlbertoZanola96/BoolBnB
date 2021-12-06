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

// // Homepage 
// Route::get('/', 'HomeController@index')->name('guest.home');

// // Search page 
// Route::get('/vue', 'HomeController@vue')->name('guest.vue');


// Route::get('/apartments', 'ApartmentController@index')->name('index');
// Route::get('/apartments/{slug}', 'ApartmentController@show')->name('guest.show');

// // Messaggi
// Route::post('/search', 'ApartmentController@handleMessageForm')->name('send');
// Route::post('apartament/message', 'Guest\LeadController@sendMessage')->name('send');

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
        Route::resource('/message', 'LeadController');
     });


//  vue routes     
Route::get('/', 'HomeController@vue')->name('vue.home');
Route::get('/{any}', 'HomeController@vue')->where('any', 'search', 'show')->name('vue');
