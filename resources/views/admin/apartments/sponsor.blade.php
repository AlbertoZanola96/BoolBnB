@extends('layouts.dashboard')

@section('title')
    | Sponsor
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="wrapper text-center">
                <h1>Sponsorizza il tuo appartamento</h1>
                <h2>Mettilo in risalto, scegli il miglior abbonamento per te!</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-wrap align-items-center justify-content-center">
            @foreach ($sponsors as $sponsor)
                <div class="sponsor d-flex flex-column align-items-center">
                    <div class="{{$sponsor->name}} card-body">
                        <h2 class="card-title">{{ $sponsor->name }}</h2>
                        <h4 class="text-light">Affrettati, se sponsorizzi ora il tuo appartamento sarà in evidenza per {{ $sponsor->duration_in_days }} giorni!</h4>
                        <button class="btn-hover btn-detail">
                            <a href=" {{ route('admin.apartments.sponsor.payment', ['slug' => $apartment->slug, 'sponsor_id' => $sponsor->id]) }} " class="card-link text-dark">Sponsorizza ora</a>
                        </button>
                        <h4 class="text-light">Acquista per {{ $sponsor->price }} €</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
