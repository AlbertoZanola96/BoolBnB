@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 bg-light welcome">
            <div class="container mt-5">
                <h1 class="mb-5">Bentornato {{$user->name}}, è un piacere rivederti!</h1>
                <h2>Cosa vuoi fare oggi?</h2>
                <a href="{{ route('admin.apartments.index') }}"><h3>Visualizza i tuoi appartamenti</h3></a>
                <a href="{{ route('admin.apartments.create') }}"><h3>Crea un nuovo appartamento</h3></a>
                <a href="{{ route('admin.message.index') }}"><h3>Visualizza i tuoi messaggi</h3></a>
            </div>
        </div>
    </div>
</div>
@endsection
