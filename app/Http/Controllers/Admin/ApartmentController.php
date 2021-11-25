<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faker $faker)
    {
        $user = Auth::user();
        // dd($user);
        $faker = new Faker();
        //convalida dati
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'num_rooms' => 'required',
            'num_beds' => 'required',
            'num_bathrooms' => 'nullable',
            'square_meters' => 'nullable',
            'address' => 'required|max:255',
            // 'lat' => 'required|max:255',
            // 'long' => 'required|max:255',
            'visible' => 'required'
        ]);

        $form_data = $request->all();

        $newApartment = new Apartment();
        $newApartment->fill($form_data);

        $slug = Str::slug($newApartment->name);
        $newApartment->user_id = $user->id;
        $newApartment->lat = '41.53436';
        $newApartment->lon = '-5.36434';
        $newApartment->slug = $slug;
        $newApartment->save();
        return redirect()->route('admin.apartments.index')->with('inserted', `L'appartamento è stato correttamente salvato`);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();

        if($apartment){
            return view('admin.apartments.show', compact('apartment'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        return view('admin.apartments.edit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'num_rooms' => 'required',
            'num_beds' => 'required',
            'address' => 'required'
        ]);

        $form_data = $request->all();
        $apartment->update($form_data);
    
        return redirect()->route('admin.apartments.index')->with('modified', 'Appartamento aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('admin.apartments.index')->with('status', 'Post elimiato');
    }
}
 