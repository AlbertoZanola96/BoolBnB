<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Lead;
use App\Click;
use Dotenv\Result\Success;

class StatsController extends Controller
{
    public function getStats(Request $request) {
        $apartment = Apartment::where('slug', $request->slug)->first(); 

        // filtro messaggi per mese 
        $leadsPerMonth = [];
        for($i = 0; $i < 12; $i++) {
            $leadsPerMonth[] = Lead::where('apartment_id', $apartment->id)->whereMonth('created_at', $i + 1)->count();
        }

        // filtro clicks per mese 
        $clicksPerMonth = [];
        for($i = 0; $i < 12; $i++) {
            $clicksPerMonth[] = Click::where('apartment_id', $apartment->id)->whereMonth('created_at', $i + 1)->count();
        }

        return response()->json([
            'success' => true,
            'leadsMonth' => $leadsPerMonth,
            'clicksMonth' => $clicksPerMonth
        ]);
    }
}
