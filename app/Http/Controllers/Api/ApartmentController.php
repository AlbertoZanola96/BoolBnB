<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApartmentController extends Controller
{
    public function searchApartments(Request $request){
        $resQuery = $request->query();

        // query filtro senza raggio di km 
        $query = Apartment::where('num_rooms', '>=', $resQuery['num_rooms'] ?? 0)
        ->where('num_beds', '>=', $resQuery['num_beds'] ?? 0)
        ->where('num_bathrooms', '>=', $resQuery['num_bathrooms'] ?? 0);

        $filteredApartments = $query->get();

        $matchingApartments = [];
        $stdRadius = $request->distance;
        // dump($stdRadius);

        // filtro ulteriormente gli appartamenti filtrati in precedenza
        foreach($filteredApartments as $apartment){
            // calcolo la distanza tra due punti 
            $distanceBetween = $this->distanceCalculation($request['lat'], $request['lon'], $apartment->lat, $apartment->lon, 2);
            
            if($distanceBetween < $stdRadius || ($request['lat'] === null && $request['lon'] === null)) {
                array_push($matchingApartments, $apartment);
            }
        };

        return response()->json([
            'success' => true,
            'count' => count($matchingApartments),
            "results" => $matchingApartments
        ]);
    }

    // Cerca singolo appartamento 
    public function showApartment(Request $request) {
    
        $apartment = Apartment::where('slug', $request->apartment_slug)->first();
        $services = $apartment->services;

        return response()->json([
            'success' => true,
            'results' => $apartment,
            'services' => $services
        ]);
    }

    // cerca appartamenti sponsorizzati 
    public function sponsored() {
        $sponsored = DB::table('apartments')->join('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')->whereDate('expiration_date', '>', Carbon::now()->toDateString())->get();
        
        return response()->json([
            'success' => true,
            'results' => $sponsored
        ]); 
    }

    // funzione distanza due punti 
    private function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $decimals = 2) {
        // Calculate the distance in degrees
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

        // Convert the distance in degrees to km
        $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
        return round($distance, $decimals);
    }
}
