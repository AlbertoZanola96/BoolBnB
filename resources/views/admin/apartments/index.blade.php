@extends('layouts.dashboard')

@section('title')
    | I miei appartamenti
@endsection

@section('content')

<div id="principale" class="container mx-auto">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 m-auto">
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
                @if (session('paymentSuccess'))
                    <div class="alert alert-success">
                        {{ session('paymentSuccess') }}
                    </div>
                @endif 
                @if (session('alreadySponsored'))
                    <div class="alert alert-danger">
                        {{ session('alreadySponsored') }}
                    </div>
                @endif 
                @if (session('paymentDenied'))
                    <div class="alert alert-danger">
                @endif 
                @if (count($apartments) == 0)
                    <div class="card mt-5">
                        <div class="card-header"></div>
                        <a href="{{ route('admin.apartments.create') }}">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="d-flex justify-content-center mt-3">Nessun appartamento inserito.</p>
                                </blockquote>
                            </div>
                        </a>
                    </div>
                @else
                    @foreach ($apartments as $apartment)
                        <div class="container-fluid card mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <!-- ap image  -->
                                    @if($apartment->image)
                                        <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}">
                                    @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- ap name  -->
                                            <h3 class="ml-3">{{ $apartment->name }}</h3>
                                            <h4 class="ml-3 mt-3" style="display: inline"><i class="fas fa-map-marker-alt mr-2"></i>{{ $apartment->city }}</h4>

                                            <!-- ap address  -->
                                            <h5 class="" style="display: inline">{{ $apartment->address }}</h5>

                                            <!-- ap description  -->
                                            <p class="ml-3 mt-3">{{ $apartment->description }}</p>

                                            <!-- card buttons  -->
                                            <a class="p-1" href="{{ route('admin.apartments.show', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn "><i class="fas fa-info"></i></button>
                                            </a>
                                            <a class="p-1" href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn"><i class="fas fa-edit"></i></button>
                                            </a>
                                            <a class="p-1" href="{{ route('admin.apartments.stats', $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn"><i class="far fa-chart-bar"></i></button>
                                            </a>
                                            <a class="p-1" href="{{ route('admin.apartments.sponsor',  $apartment->slug) }}">
                                                <button class="btn btn-dark my-btn"><i class="fas fa-gem"></i></button>
                                            </a>
                                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" style="display: inline" class=" m-1 deleteForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn bruschetta my-btn"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection