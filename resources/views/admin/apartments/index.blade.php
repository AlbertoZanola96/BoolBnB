@extends('layouts.dashboard')

@section('content')
    @if (session('inserted'))
        <div class="alert alert-success">
            {{ session('inserted') }}
        </div>
    @endif
    @if (session('modified'))
        <div class="alert alert-success">
            {{ session('modified') }}
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @endif 
    {{-- @if (empty($apartments->items))
        <h2>Non hai ancora inserito nessun appartamento, <a href="{{ route('admin.apartments.create') }}">crea il tuo primo annuncio</a></h2>
    @else --}}
    <div class="container-fluid principale">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 m-auto">
                @foreach ($apartments as $apartment)
                    <div class="container card mb-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @if($apartment->image)
                                    <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}">
                                @endif
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h3 class="ml-3">{{ $apartment->name }}</h3>
                                            <h4 class="ml-3 mt-3" style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ $apartment->city }}</h4>
                                            <h5 class="" style="display: inline">{{ $apartment->address }}</h5>
                                            <p class="ml-3 mt-3">{{ $apartment->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end ">
                                            <a class="m-1" href="{{ route('admin.apartments.show', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn "><i class="fas fa-info"></i></button>
                                            </a>
                                            <a class="m-1" href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn"><i class="fas fa-edit"></i></button>
                                            </a>
                                            <a class="m-1" href="{{ route('admin.apartments.sponsor', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn"><i class="fas fa-gem"></i></button>
                                            </a>
                                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" style="display: inline" class="deleteForm m-1" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger my-btn"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- @endif --}}
@endsection