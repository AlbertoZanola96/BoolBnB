@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit apartment</h1>
                
                <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST">
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

                    {{-- city  --}}
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $apartment->city) }}">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- address  --}}
                    <div class="form-group">
                        <label for="address">Indirizzo</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $apartment->address) }}">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                        <button type="submit" class="btn btn-success">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection