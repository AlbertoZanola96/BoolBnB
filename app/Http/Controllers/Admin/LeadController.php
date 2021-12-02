<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Lead;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index(){
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        for ($i = 0; $i < count($apartments); $i++) {
            $apartments_id[$i] = $apartments[$i]->id;
        }
        for ($i = 0; $i < count($apartments_id); $i++) {
            $apartmentsleads[$i] = Lead::where('apartment_id', $apartments_id[$i])->get();
        }
        return view('admin.apartments.message', compact('apartmentsleads', 'apartments'));
    }

    public function destroy($id)
    {
        $lead = Lead::where('id', $id)->first();
        $lead->delete();
        return redirect()->route('admin.message.index')->with('deleted', 'Messaggio cancellato');
    }
}
