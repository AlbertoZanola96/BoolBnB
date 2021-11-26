@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($apartments as $apartment)
            <li><a href="{{ route('show', $apartment->slug) }}">{{ $apartment->name }}</a></li>
        @endforeach
    </ul>
@endsection