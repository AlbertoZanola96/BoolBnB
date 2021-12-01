<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Lead;

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

    public function sendMessage(Request $request) {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $form_data = $request->all();
        $slug = $form_data['slug'];
        $new_lead = new Lead();
        $new_lead->fill($form_data);
        $new_lead->save();
        return redirect()->route('show', $slug);
    }
}
