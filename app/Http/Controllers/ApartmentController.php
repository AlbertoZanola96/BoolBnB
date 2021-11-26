<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('guest.apartments.index', compact('apartments'));
    }
    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        if (!$apartment) {
            abort(404);
        }
        return view('guest.apartments.show', compact('apartment'));
    }
}
