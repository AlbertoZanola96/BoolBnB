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

Route::get('/', 'HomeController@index')->name('guest.home');
Route::get('/apartments/contact', 'Guest\ApartmentController@contact')->name('guest.apartments.contact');
Route::get('/apartments/{slug}', 'Guest\ApartmentController@show')->name('guest.apartments.show');

Route::get('/apartments', 'ApartmentController@index')->name('index');
Route::get('/apartments/{slug}', 'ApartmentController@show')->name('show');

Auth::routes();

// Admin Routes
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('/apartments', 'ApartmentController');
     });

