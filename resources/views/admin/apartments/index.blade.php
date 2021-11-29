@extends('layouts.dashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('modified'))
        <div class="alert alert-succes">
            {{ session('modified') }}
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>

    @endif 
    @foreach ($apartments as $apartment)
        <div class="container my_cont mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="img"></div>
                    <div class="col-8 elementi">
                        <h2>{{ $apartment->name }}</h2>
                        <h4 style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ $apartment->city }}</h4>
                        <h5 style="display: inline">{{ $apartment->address }}</h5>
                        <p>{{ $apartment->description}}</p>
                    </div>
                    <div class=" d-flex align-items-end justify-content-center flex-column my-btn">
                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}">
                            <button class="btn btn-dark m-2 ">Details</button>
                        </a>

                        <a href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                            <button class="btn btn-dark m-2 d-flex align-items-center">Modify</button>
                        </a>
                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" style="display: inline" class="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2 d-flex align-items-center">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach 
@endsection