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
Route::get('/apartments/{slug}', 'ApartmentController@show')->name('show');

Auth::routes();

// Admin Routes
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('/apartments', 'ApartmentController');
     });

