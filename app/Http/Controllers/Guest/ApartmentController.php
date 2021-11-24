<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Lead;

class ApartmentController extends Controller
{
    //dettaglio appartamenti guest 
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        return view('guest.apartments.show', compact('apartment'));
    }

    // return view message form

    public function contact() {
        return view('guest.apartments.contact');
    }

}
