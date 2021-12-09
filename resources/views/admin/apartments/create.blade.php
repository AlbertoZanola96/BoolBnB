
@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-auto">
                <h1>Informazioni generali</h1>
                            
                <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    {{-- name  --}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" placeholder="Inserisci nome" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- description  --}}
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" placeholder="Inserisci descrizione" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_rooms  --}}
                    <div class="form-group">
                        <label for="num_rooms">Numero di stanze</label>
                        <input type="number" id="num_rooms" placeholder="Inserisci numero di stanze" name="num_rooms" min="1" class="form-control @error('num_rooms') is-invalid @enderror" value="{{ old('num_rooms') }}">
                        @error('num_rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_beds  --}}
                    <div class="form-group">
                        <label for="num_beds">Numero di letti</label>
                        <input type="number" id="num_beds" placeholder="Inserisci numero di letti" name="num_beds" min="1" class="form-control @error('num_beds') is-invalid @enderror" value="{{ old('num_beds') }}">
                        @error('num_beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_bathrooms  --}}
                    <div class="form-group">
                        <label for="num_bathrooms">Numero di bagni</label>
                        <input type="number" id="num_bathrooms" placeholder="Inserisci numero di bagni" name="num_bathrooms" min="1" class="form-control @error('num_bathrooms') is-invalid @enderror" value="{{ old('num_bathrooms') }}">
                        @error('num_bathrooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- square meters  --}}
                    <div class="form-group">
                        <label for="square_meters">Metri quadrati</label>
                        <input type="number" id="square_meters" placeholder="Inserisci metri quadrati" name="square_meters" min="25" class="form-control @error('square_meters') is-invalid @enderror" value="{{ old('square_meters') }}">
                        @error('square_meters')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- city 
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
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
                            <input
                            {{ in_array($service->id, old('services', [])) ? 'checked' : null }}
                            class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->id }}">
                            <label class="form-check-label" for="{{ $service->id }}">
                                {{ $service->name }}
                            </label>
                        </div>
                    @endforeach

                    {{-- inserimento immagine --}}
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
                            <option value="1">Visibile</option>
                            <option value="0">Non visibile</option>
                        </select>
                    </div>

                    {{-- submit  --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Crea nuovo appartamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script search auatocomplete  --}}
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

    {{-- frontend validation  --}}
    <script src="{{ asset('js/form_client_validation.js') }}"></script>
@endsection
    
