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

// Homepage 
Route::get('/', 'HomeController@index')->name('guest.home');

// Search page 
Route::get('/search', 'HomeController@search')->name('guest.search');


Route::get('/apartments', 'ApartmentController@index')->name('index');
Route::get('/apartments/{slug}', 'ApartmentController@show')->name('guest.show');

// Messaggi
// Route::post('/search', 'ApartmentController@handleMessageForm')->name('send');
Route::post('apartament/message', 'ApartmentController@sendMessage')->name('send');

Auth::routes();

// Admin Routes
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/apartments/sponsor', 'ApartmentController@sponsor')->name('apartments.sponsor');
        Route::resource('/apartments', 'ApartmentController');
        Route::get('/message', 'ApartmentController@message')->name('message');
     });

