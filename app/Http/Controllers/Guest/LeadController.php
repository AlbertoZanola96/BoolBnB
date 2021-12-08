<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class LeadController extends Controller
{
    // collerato a vue
    // public function handleMessageForm(Request $request) {
    //     $request->validate([
    //         'name' => 'required|max:20',
    //         'email' => 'required|email',
    //         'message' => 'required'
    //     ]);
    //     $form_data = $request->all();
    //     $new_lead = new Lead();
    //     $new_lead->apartment_id = 3;
    //     $new_lead->fill($form_data);
    //     $new_lead->save();
    //     return view('guest.search');
    // }

    // public function sendMessage(Request $request) {
    //     $request->validate([
    //         'name' => 'required|max:20',
    //         'email' => 'required|email',
    //         'message' => 'required'
    //     ]);
    //     $form_data = $request->all();
    //     $slug = $form_data['slug'];
    //     $new_lead = new Lead();
    //     $new_lead->fill($form_data);
    //     $new_lead->save();
    //     return redirect()->route('show', $slug);
    // }
}
