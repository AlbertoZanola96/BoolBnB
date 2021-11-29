<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentsController extends Controller
{
    public function searchApartment() {
        $apartments = Apartment::all();
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }
}
