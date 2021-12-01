@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Sponsorizza la tua casa</h1>
    <h2>Mettila in risalto tra i primi annunci</h2>
    <div class="row ">
       <div class="gold  d-flex ">
            <div class="card card-gold" style="width: 18rem;">
                <div class="card-body">
                <h2 class="card-title">Gold</h2>
                <h3 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h2>
                <button class="btn-hover color-1"><a href="#" class="card-link">Sponsorizza ora</a></button>
                <h4>50€/al mese</h4>
            </div>
        </div>
        <div class="silver d-flex ">
            <div class="card card-silver" style="width: 18rem;">
                <div class="card-body">
                <h2 class="card-title">Silver</h2>
                <h3 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h3>
                <button class="btn-hover color-1"><a href="#" class="card-link">Sponsorizza ora</a></button>
                <h4>20€/al mese</h4>
            </div>
        </div>
        <div class="bronze d-flex ">
            <div class="card card-bronze" style="width: 18rem;">
                <div class="card-body">
                <h2 class="card-title">Bronze</h2>
                <h3 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</h3>
                 <button class="btn-hover color-1"><a href="#" class="card-link">Sponsorizza ora</a></button>
                 <h4>5€/al mese</h4>
            </div>
        </div>
    </div>
</div>
@endsection