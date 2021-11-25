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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
                <tr>
                    <th scope="row">{{ $apartment->id }}</th>
                    <td>{{ $apartment->name }}</td>
                    <td>{{ $apartment->address }}</td>
                   
                    <td>
                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                        <a href="{{ route('admin.apartments.edit', $apartment->slug) }}">
                            <button class="btn btn-warning">Modify</button>
                        </a>
                        <form action="" class="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection