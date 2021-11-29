@extends('layouts.dashboard')

@section('content')
<div id="admin_show_container">
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary" href="{{ route('admin.apartments.index') }}"><span>&#8592;</span> Torna ai tuoi immobili</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-4 marble-background">
                    <h1 class="font-ml mb-0">{{$apartment->name}}</h1>
                    <div class="font-xxs">{{$apartment->address}}</div>
                    <hr>
                    <div class="font-s">Prezzo: <span class="green-background p-1"><span class="font-xs">450&euro;</span> / giorno</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="my-5">
                    <img class="w-100 shadow" src="{{asset('img/casa-1.jpeg')}}" alt="">
                </div>

                <div class="marble-background p-4 my-5">
                    <h2 class="font-m">Indirizzo immobile:</h2>
                    <p>{{ $apartment->address }}</p>
                </div>  

                <div class="d-flex justify-content-between align-items-start">
                    <div class="w-45 marble-background p-4">
                        <h2>Caratteristiche immobile:</h2>
                        <ul class="list-group overflow-auto info-box">
                            <li class="list-group-item">
                                <span class="darkgray-text">Numero stanze: </span>
                                <span>{{ $apartment->num_rooms }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="darkgray-text">Numero letti: </span>
                                <span>{{ $apartment->num_beds }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="darkgray-text">Numero bagni: </span>
                                <span>{{ $apartment->num_bathrooms }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="darkgray-text">Metri quadrati: </span>
                                <span>{{ $apartment->square_meters }}mq</span>
                            </li>
                            <li class="list-group-item">
                                <span class="darkgray-text">Indirizzo: </span>
                                <span>{{$apartment->address}}</span>
                            </li>
                        </ul>
                    </div>
    
                    <div class="w-45">
                        <div class="marble-background p-4">
                            <h2 class="font-m">Servizi dell'immobile:</h2>
        
                            <ul class="d-flex p-0 info-box services-list flex-wrap">
                                <li>
                                    Piscina
                                </li>
                                <li>
                                    Wi-Fi
                                </li>
                                <li>
                                    Bar
                                </li>
                                <li>
                                    TV
                                </li>
                                <li>
                                    Aria Condizionata
                                </li>
                                <li>
                                    Cucina
                                </li>
                                <li>
                                    TV
                                </li>
                                <li>
                                    Aria Condizionata
                                </li>
                                <li>
                                    Cucina
                                </li>
                                <li>
                                    TV
                                </li>
                                <li>
                                    Aria Condizionata
                                </li>
                                <li>
                                    Cucina
                                </li>
                            </ul>
                        </div>  
                    </div> 
                </div>
            </div> 

            <div class="col-12 col-md-4 p-4">
                <div class="sticky-top">
                    <h3 class="font-sm py-4">Opzioni scheda appartamento</h3>

                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('admin.apartments.edit', $apartment->slug) }}" class="btn btn-dark w-100">
                                Modifica scheda immobile
                            </a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="" class="btn btn-dark w-100">
                                Sponsorizzazione immobile
                            </a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" class="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Elimina scheda immobile</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="marble-background p-4 my-5">
                    <h2 class="font-m">Descrizione:</h2>
                    <p>{{ $apartment->description }}</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, tenetur? Quo, nemo. Dolor quisquam fugiat numquam est nesciunt nam a, ducimus ex doloremque. Nisi deserunt earum veritatis, ad totam laudantium? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus consectetur qui debitis, perspiciatis consequatur repellendus quae accusamus alias autem placeat deleniti? Laborum necessitatibus soluta amet eveniet ab non ea molestiae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, eos dicta. Quidem reprehenderit consectetur natus numquam quae laudantium, sed assumenda dolor quaerat placeat nam nisi odio consequuntur itaque animi blanditiis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere porro illum id vel velit dolore minima quisquam! Aliquam amet ea rem natus tempore nesciunt excepturi, suscipit officia vel, ipsum laboriosam. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo adipisci beatae illum laudantium culpa! Quibusdam aliquam alias harum repellendus. Assumenda maxime sint autem enim asperiores expedita iste odio dolores quae!</p>
                </div>  
            </div> 
        </div>

        <div class="row">
        </div>
    </div>
</div>
@endsection