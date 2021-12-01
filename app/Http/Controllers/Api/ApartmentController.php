<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function searchApartment(Request $request) {
        $resQuery = $request->query();

        $apartments = Apartment::where($resQuery)->get();


        return response()->json([
            'success' => true,
            "results" => $apartments
        ]);
    }
}
