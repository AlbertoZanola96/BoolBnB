@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      {{ $apartment->name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $apartment->description }}</p>
                        <p class="card-text">Numero stanze: {{ $apartment->num_rooms }}</p>
                        <p class="card-text">Numero letti: {{ $apartment->num_beds }}</p>
                        <p class="card-text">Numero bagni: {{ $apartment->num_bathrooms }}</p>
                        <p class="card-text">Grandezza: {{ $apartment->square_meters }}</p>
                        <p class="card-text">Indirizzo: {{ $apartment->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection