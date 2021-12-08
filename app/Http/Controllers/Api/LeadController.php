<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class LeadController extends Controller
{
    public function sendMessage(Request $request) {
        $request->validate([
            'apartment_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $form = $request->all();
        
        $newLead = new Lead();
        $newLead->fill($form);
        $newLead->save();

        return response()->json([
            'success' => true
        ]);
    }
}
