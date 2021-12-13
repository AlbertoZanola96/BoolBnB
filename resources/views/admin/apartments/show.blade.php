@extends('layouts.dashboard')

@section('title')
    | {{ $apartment->name }}
@endsection

@section('content')

<div id="show_container">
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary shadow" href="{{ route('admin.apartments.index') }}"><span>&#8592;</span> Torna ai tuoi immobili</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-4 white-background shadow">
                    <div class="d-flex item-align-end">
                        <i class="fas fa-home font-m"></i>
                        <h1 class="font-ml mb-0 ml-3">{{$apartment->name}}</h1>
                    </div>
                    <hr class="d-none d-md-block">
                    <div class="d-none d-md-inline-block">
                        <ul class="font-xxs d-flex p-0">
                            <li>
                                <i class="fas fa-map-marker-alt font-xxs"></i>
                                <span>{{$apartment->address}}</span>
                            </li>
                            <li class="mx-3">|</li>
                            <li>
                                <i class="fas fa-door-open font-xxs"></i>
                                <span>{{$apartment->num_rooms}} camere</span>
                            </li>
                            <li class="mx-3">|</li>
                            <li>
                                <i class="fas fa-bed font-xxs"></i>
                                <span>{{$apartment->num_beds}} letti</span>
                            </li>
                            <li class="mx-3">|</li>
                            <li>
                                <i class="fas fa-ruler-combined font-xxs"></i>
                                <span>{{$apartment->square_meters}}mq</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="my-5">
                    @if($apartment->image)
                        <img class="my-img" src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}">
                    @endif
                    {{-- <img class="w-100 shadow" src="https://www.lignius.it/fileadmin/_processed_/b/8/csm_suedtirolhaus_MirrorHouses_5cbac.0_a556da6959.jpg" alt=""> --}}
                </div> 

                <div class="d-flex justify-content-between align-items-start container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 justify-content-between">
                        <div class="col pr-lg-3 p-0">
                            <div class="white-background p-4 shadow">
                                <h2 class="mb-4 font-sm">Caratteristiche immobile:</h2>
                                <ul class="list-group">
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
                        </div>

                        <div class="col pl-lg-3 pt-5 pt-lg-0 p-0">
                            <div class="white-background p-4 shadow">
                                <h2 class="font-sm mb-4">Servizi dell'immobile:</h2>
            
                                <ul class="d-flex p-0 info-container services-list flex-wrap">
                                    @foreach ($apartment->services as $service)
                                        <li>
                                            <span class="shadow">{{ $service->name}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div> 

            <div class="col-12 col-md-4 px-md-4 pt-md-4">
                <div class="sticky-top pt-3">
                    <h3 class="font-ss text-center my-2 p-3 white-background shadow">Opzioni scheda appartamento</h3>

                    <ul class="list-group mt-3 shadow">
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('admin.apartments.edit', $apartment->slug) }}" class="btn btn-dark w-100">
                                Modifica scheda immobile
                            </a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('admin.apartments.sponsor', $apartment->slug) }}" class="btn btn-dark w-100">
                                Sponsorizza immobile
                            </a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('admin.apartments.stats', $apartment->slug) }}" class="btn btn-dark w-100">
                                Visualizza statistiche
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
                <div class="white-background p-4 my-5 shadow">
                    <h2 class="font-m">Descrizione:</h2>
                    <hr>
                    <p>{{ $apartment->description }}</p>
                </div>  
            </div> 
        </div>
    </div>
</div>
@endsection