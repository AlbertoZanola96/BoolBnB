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
    <div class="container-fluid principale">
        <div class="row">
            <div class="col-10">
                @foreach ($apartments as $apartment)
                    <div class="container card mb-3">
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="img"></div>
                                <div class="text ps-3">
                                    <h2>{{ $apartment->name }}</h2>
                                    <h4 style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ $apartment->city }}</h4>
                                    <h5 style="display: inline">{{ $apartment->address }}</h5>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col my-btn d-flex align-items-end justify-content-center flex-column my-btn">
                                            <a href="{{ route('admin.apartments.show', $apartment->slug) }}">
                                                <button class="btn btn-dark m-2 my-btn ">Details</button>
                                            </a>
                                            <a href="{{ route('admin.apartments.stats', $apartment->slug) }}">
                                                <button class="btn btn-dark m-2 my-btn ">Stats</button>
                                            </a>
                                            <a href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                                <button class="btn btn-dark m-2 my-btn">Modify</button>
                                            </a>
                                            <a href="{{ route('admin.apartments.sponsor') }}">
                                                <button class="btn btn-dark m-2 my-btn">Sponsor</button>
                                            </a>
                                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" style="display: inline" class="deleteForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-2 my-btn">Delete</button>
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
@endsection