@extends('layouts.dashboard')

@section('title')
    | Messaggi
@endsection

@section('content')
    <div id="single-apartment" class="container">
        @foreach ($leads as $lead)
            <div class="row">
                <div class="col-12">
                    {{ $lead->email }}
                </div>
            </div>
        @endforeach
    </div>
@endsection