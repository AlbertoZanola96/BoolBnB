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

        return view('admin.apartments.messagesInbox', compact('apartments', 'user'));
    }

    public function show($slug) {
        $user = Auth::user();
        $apartment = Apartment::where('slug', $slug)->first();
        $leads = Lead::where('apartment_id', $apartment->id)->get();
        
        return view('admin.apartments.messages', compact('leads', 'user'));
    }

    public function destroy($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        return redirect()->back()->with('deleted', 'Messaggio cancellato');
    }
}
