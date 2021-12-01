@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Sponsorizza la tua casa</h1>
    <h2>Mettila in risalto tra i primi annunci</h2>
    
    <div class="row ">
        @foreach ($sponsors as $sponsor)
            <div class="gold  d-flex ">
                <div class="card card-gold" style="width: 18rem;">
                    <div class="card-body">
                    <h2 class="card-title">{{ $sponsor->name }}</h2>
                    <h3 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h2>
                    <button class="btn-hover color-1"><a href="#" class="card-link">Sponsorizza ora</a></button>
                    <h4>{{ $sponsor->price }}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
