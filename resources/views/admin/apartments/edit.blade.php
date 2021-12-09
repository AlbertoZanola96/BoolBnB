@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica informazioni generali</h1>

                {{-- invalid address message --}}
                @if (session('invalid_address'))
                    <div class="alert alert-danger">
                        {{ session('invalid_address') }}
                    </div>
                @endif
                
                <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- name  --}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $apartment->name) }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- description  --}}
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $apartment->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_rooms  --}}
                    <div class="form-group">
                        <label for="num_rooms">Numero di camere</label>
                        <input type="number" id="num_rooms" name="num_rooms" min="1" value="{{ old('num_rooms', $apartment->num_rooms) }}" class="form-control value @error('num_rooms') is-invalid @enderror">
                        @error('num_rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_beds  --}}
                    <div class="form-group">
                        <label for="num_beds">Numero di letti</label>
                        <input type="number" id="num_beds" name="num_beds" min="1" value="{{ old('num_beds', $apartment->num_beds) }}" class="form-control @error('num_beds') is-invalid @enderror">
                        @error('num_beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_bathrooms  --}}
                    <div class="form-group">
                        <label for="num_bathrooms">Numero di bagni</label>
                        <input type="number" id="num_bathrooms" name="num_bathrooms" min="1" value="{{ old('num_bathrooms', $apartment->num_bathrooms) }}" class="form-control @error('num_bathrooms') is-invalid @enderror">
                        @error('num_bathrooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- square meters  --}}
                    <div class="form-group">
                        <label for="square_meters">Metri quadrati</label>
                        <input type="number" id="square_meters" name="square_meters" min="25" value="{{ old('square_meters', $apartment->square_meters) }}" class="form-control @error('square_meters') is-invalid @enderror">
                        @error('square_meters')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- city 
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $apartment->city) }}">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- address  --}}
                    <div class="form-group search-box">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- servizi  --}}
                    <label for="services" class="d-block font-weight-bold">Servizi</label>
                    @foreach ($services as $service)
                        <div class="form-check mb-3 form-check-inline">
                            @if($errors->any()) 
                                <input
                                {{ in_array($service->id, old('services', [])) ? 'checked' : null }}
                                class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->id }}">
                                <label class="form-check-label" for="{{ $service->id }}">
                                    {{ $service->name }}
                                </label>
                            @else
                                <input
                                {{ $apartment->services->contains($service->id) ? 'checked' : null }}
                                class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->id }}">
                                <label class="form-check-label" for="{{ $service->id }}">
                                    {{ $service->name }}
                                </label>
                            @endif
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label class="d-block" for="new_img">Immagine appartamento</label>
                        <input type="file" id="new_img" name="new_img" class=" @error('new_img') is-invalid @enderror">
                        @error('new_img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- visible  --}}
                    <div class="form-group">
                        <label for="visible">Vuoi rendere visibile il nuovo appartamento?</label>
                        <select name="visible" id="visible" class="form-control">
                            <option value="1">Rendi visibile</option>
                            <option value="0">Non rendere visibile</option>
                        </select>
                    </div>

                    {{-- submit  --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var options = {
            searchOptions: {
                key: 'bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
                language: 'it-IT',
                limit: 5
            },
            autocompleteOptions: {
                key: 'bUmDAHcIFvGHLQEcg77j9yMpuaI5gGMF',
                language: 'it-IT'
            }
        };
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
        var searchBox = document.querySelector('.search-box');
        searchBox.append(searchBoxHTML);
        document.querySelector('input.tt-search-box-input').name = 'address';
        document.querySelector('input.tt-search-box-input').placeholder = 'Inserisci Indirizzo Completo';
    </script>
@endsection