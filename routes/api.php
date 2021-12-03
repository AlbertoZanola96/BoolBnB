<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Search apartments 
Route::get('/apartments', 'Api\ApartmentController@searchApartments');

// Search single apartment 
Route::get('/apartment', 'Api\ApartmentController@showApartment');


// click tracking api route 
Route::post('/clicks', 'Api\ClickController@clickTracking');