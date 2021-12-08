<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Sponsor;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(Request $request, $slug) {
        $apartment = Apartment::where('slug', $slug)->first();
        $sponsor = Sponsor::find($request->sponsor_id);
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '68zm3d74hmnwj9ps',
            'publicKey' => 'wjx8frz56rd8yh77',
            'privateKey' => '4ced45a0e6596a49284c0050aaafb3ef'
          ]);

          $clientToken = $gateway->clientToken()->generate();
        return view('admin.apartments.payment', compact('clientToken', 'apartment', 'sponsor'));
    }

    public function checkout(Request $request, $slug) {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '68zm3d74hmnwj9ps',
            'publicKey' => 'wjx8frz56rd8yh77',
            'privateKey' => '4ced45a0e6596a49284c0050aaafb3ef'
          ]);
          
        // Prendo l'appartamento da sponsorizzare e lo sponsor scelto
        $apartment = Apartment::where('slug', $slug)->first();  
        $sponsor = Sponsor::find($request->sponsor_id);
        
        // nonce ricevuto dal client side
        $nonceFromTheClient = $request->payment_method_nonce;

        // Creo una nuova transaction 
        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $nonceFromTheClient,
            'customer' => [
                'firstName' => Auth::user()->name,
                'lastName' => Auth::user()->surname,
                'email' => Auth::user()->email
            ],
            'options' => [
            'submitForSettlement' => True
            ]
        ]);
        
        if($result->success) {
            $startDate = Carbon::now()->toDateTimeString();
            $expirationDate = Carbon::now()->add($sponsor->duration_in_days, 'days')->toDateTimeString(); 

            // dd($startDate);

            $apartment->sponsors()->attach($sponsor->id, [
                'start_date' => $startDate,
                'expiration_date' => $expirationDate,
                'status' => true,
                'payment_id' => $result->transaction->id
            ]);

        return redirect()->route('admin.apartments.index')->with('paymentSuccess', 'Appartamento sponsorizzato con successo');
        }

        // TODO: redirect della pagina alla pagina sponsor con session successfull o denied 

    }
}
