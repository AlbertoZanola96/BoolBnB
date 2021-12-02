<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Click;
use Facade\FlareClient\Glows\Recorder;

class ClickController extends Controller
{
    public function clickTracking(Request $request) {
        // ricavo ip e apartment_id dalla richiesta
        $guest_ip = $request->ip_address;
        $apartment_id = $request->apartment_id;
        
        //controllo se c'è già un click di quello ip collegato a quello specifico appartamento
        $clicks = Click::where('apartment_id', $apartment_id)->get();
        
        foreach($clicks as $click) {
            if($click->ip_address == $guest_ip) {
                echo 'record trovato';
                die;
            }   
        }

        // creo un nuovo record se non trova l'ip
        $newClick = new Click();
        $form = $request->all();
        $newClick->fill($form);
        $newClick->save();
        echo 'record creato';
    }
}
