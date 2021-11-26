@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sono la pagina show</h1>

                <ul>
                    <li>{{ $apartment['name']}}</li>
                    <li>{{ $apartment['address']}}</li>
                    <li>{{ $apartment['square_meters']}}</li>
                    <li>{{ $apartment['description']}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection