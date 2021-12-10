<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Service;
use App\Sponsor;
use Illuminate\Support\Facades\Storage;
use App\Click;
use App\Lead;



class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        return view('admin.apartments.index', compact('apartments', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $services = Service::all();
        return view('admin.apartments.create', compact('services', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // definiamo l'utente logato
        $user = Auth::user();
        
        //convalidiamo i dati ricevuti
        // dd($request);
        $request->validate([
            'name' => 'required|max:255|unique:apartments,name',
            'description' => 'required',
            'num_rooms' => 'required|integer|min:1|max:10',
            'num_beds' => 'required|integer|min:1|max:10',
            'num_bathrooms' => 'nullable|integer|min:1|max:10',
            'square_meters' => 'nullable|integer|min:30|max:1000',
            'address' => 'required|max:255',
            'services' => 'exists:services,id',
            'visible' => 'required',
            'image' => 'image'
        ]);

        // accediamo ai dati tramite la request, creiamo un nuovo apartment ed assegniamo i dati ricevuti 
        $form_data = $request->all();
       
        // verifico se è stata caricata un'immagine
        if(array_key_exists('new_img', $form_data)) {
            //se esiste salviamo l'immagine e recuperiamo il path
            $image_path = Storage::put('apartment_images', $form_data['new_img']);
            $form_data['image'] = $image_path;
        }
        
        $newApartment = new Apartment();
        $newApartment->fill($form_data);

        // assegniamo l'id dell'utente logato 
        $newApartment->user_id = $user->id;

        // creiamo lo slug utilizzando il nome della struttura 
        $slug = Str::slug($newApartment->name);
        $newApartment->slug = $slug;

        // Facciamo la Request di lat e lon tramite l'indirizzo inserito
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $newApartment->address . '.json?key=bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF');

        // controlliamo che ci sia un risultato altrimenti facciamo un redirect con un messaggio di errore
        if(empty($response->json()['results'])) {
            return redirect()->route('admin.apartments.create')->with('invalid_address', 'Indirizzo Invalido')->withInput();
        }
        
        $res_address = $response->json()['results'][0];
        // dd($response->json());
        // dd($res_address);

        // salviamo lat e lon in una variabile 
        $lat = $res_address['position']['lat'];
        $lon = $res_address['position']['lon'];
        
        // assegniamo lat e lon a new apartment 
        $newApartment->lat = $lat;
        $newApartment->lon = $lon;

        // salviamo il nuovo apartment 
        $newApartment->save();

        // attach servizi all'appartamento 
        $newApartment->services()->attach($form_data['services']);

        return redirect()->route('admin.apartments.index')->with('inserted', 'L\'appartamento è stato correttamente salvato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $apartment = Apartment::where('slug', $slug)->first();

        if(!$apartment) {
            abort(404);
        } elseif(Auth::user()->id != $apartment->user_id) {
            return redirect()->back();
        }
        
        return view('admin.apartments.show', compact('apartment', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();
        $services = Service::all();
        $apartment = Apartment::where('slug', $slug)->first();

        if(!$apartment) {
            abort(404);
        } elseif(Auth::user()->id != $apartment->user_id) {
            return redirect()->back();
        }

        return view('admin.apartments.edit', compact('apartment', 'services', 'user'));
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
            'name' => 'required|max:255',
            'description' => 'required',
            'num_rooms' => 'required|integer|min:1|max:10',
            'num_beds' => 'required|integer|min:1|max:10',
            'num_bathrooms' => 'nullable|integer|min:1|max:10',
            'square_meters' => 'nullable|integer|min:30|max:1000',
            // 'city' => 'required',
            'address' => 'required|max:255',
            'services' => 'exists:services,id',
            'visible' => 'required',
            'image' => 'image'
        ]);

        $form_data = $request->all();

        // Request di lat e lon tramite l'indirizzo inserito
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $request->address . '.json?key=bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF');

        // controlliamo che ci sia un risultato altrimenti facciamo un redirect con un messaggio di errore
        if(empty($response->json()['results'])) {
            return redirect()->route('admin.apartments.edit', $apartment->slug)->with('invalid_address', 'Indirizzo Invalido')->withInput();
        }
        
        $res_address = $response->json()['results'][0];
        // dd($response->json());
        // dd($res_address);

        // salviamo lat e lon in una variabile 
        $lat = $res_address['position']['lat'];
        $lon = $res_address['position']['lon'];
        
        // assegniamo lat e lon a new apartment 
        $apartment->lat = $lat;
        $apartment->lon = $lon;

        // verifico se e' stata caricata un'immagine 
        if(array_key_exists('new_img', $form_data)) {
            Storage::delete($apartment->image);;
            $image_path = Storage::put('apartment_images', $form_data['new_img']);
            $form_data['image'] = $image_path;
        }

        // aggiorniamo l'appartamento 
        $apartment->update($form_data);

        // sync services 
        if(array_key_exists('services', $form_data)) {
            $apartment->services()->sync($form_data['services']);
        } else {
            $apartment->services()->sync([]);
        }
    
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
        return redirect()->route('admin.apartments.index')->with('deleted', 'Appartamento cancellato');
    }

    // sponsor -------------------------------------
    public function sponsor($slug) {  
        $user = Auth::user(); 
        $apartment = Apartment::where('slug', $slug)->first(); 
        $sponsors = Sponsor::all();
        return view('admin.apartments.sponsor', compact('sponsors', 'apartment', 'user'));
    }   

    // statistiche --------------------------------
    public function viewStats($slug) {      
        $user = Auth::user(); 
        $apartment = Apartment::where('slug', $slug)->first(); 

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
        
        json_encode($leadsPerMonth);
        json_encode($clicksPerMonth);

        return view('admin.apartments.stats', compact('user', 'leadsPerMonth', 'clicksPerMonth', 'apartment'));
    }
}
 