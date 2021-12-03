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

// Search apartments api route 
Route::get('/apartments', 'Api\ApartmentController@searchApartment');

// click tracking api route 
Route::post('/clicks', 'Api\ClickController@clickTracking');