
@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Creazione nuovo appartmento</h1>

                {{-- invalid address message --}}
                @if (session('invalid_address'))
                    <div class="alert alert-danger">
                        {{ session('invalid_address') }}
                    </div>
                @endif
                            
                <form action="{{ route('admin.apartments.store') }}" method="post">
                    @csrf
                    @method('POST')

                    {{-- name  --}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- description  --}}
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_rooms  --}}
                    <div class="form-group">
                        <label for="num_rooms">Numero di stanze</label>
                        <input type="number" id="num_rooms" name="num_rooms"  class="form-control @error('num_rooms') is-invalid @enderror" value="{{ old('num_rooms') }}">
                        @error('num_rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_beds  --}}
                    <div class="form-group">
                        <label for="num_beds">Numero di letti</label>
                        <input type="number" id="num_beds" name="num_beds" min="1" class="form-control @error('num_beds') is-invalid @enderror" value="{{ old('num_beds') }}">
                        @error('num_beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- num_bathrooms  --}}
                    <div class="form-group">
                        <label for="num_bathrooms">Numero di bagni</label>
                        <input type="number" id="num_bathrooms" name="num_bathrooms" min="1" class="form-control @error('num_bathrooms') is-invalid @enderror" value="{{ old('num_bathrooms') }}">
                        @error('num_bathrooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- square meters  --}}
                    <div class="form-group">
                        <label for="square_meters">Metri quadrati</label>
                        <input type="number" id="square_meters" name="square_meters" min="25" class="form-control @error('square_meters') is-invalid @enderror" value="{{ old('square_meters') }}">
                        @error('square_meters')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- city  --}}
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- address  --}}
                    <div class="form-group search-box">
                        {{-- <label for="address">Indirizzo</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    {{-- visible  --}}
                    <div class="form-group">
                        <label for="visible">Vuoi rendere visibile il nuovo appartamento?</label>
                        <select name="visible" id="visible" class="form-control">
                            <option value="true">Rendi visibile</option>
                            <option value="false">Non rendere visibile</option>
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
        // document.body.append(searchBoxHTML);
    </script>
    <script src="{{ asset('js/form_client_validation.js') }}"></script>
@endsection
    
