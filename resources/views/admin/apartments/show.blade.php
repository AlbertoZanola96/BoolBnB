@extends('layouts.app')

@section('content')
    <h1>Sono la pagina show</h1>

    <ul>
        <li>{{ $apartment['name']}}</li>
        <li>{{ $apartment['address']}}</li>
        <li>{{ $apartment['square_meters']}}</li>
        <li>{{ $apartment['description']}}</li>
    </ul>
@endsection