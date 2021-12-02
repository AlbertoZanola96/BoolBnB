@extends('layouts.dashboard')

@section('content')
    {{-- <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">I TUOI MESSAGGI</h1>
            </div>
        </div>
    </div> --}}
    @foreach ($apartmentsleads as $apartmentleads)
        @foreach ($apartmentleads as $lead)
            <div class="container-fluid pt-5 pb-5 lead">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="text">
                            <p>Messaggio ricevuto da {{ $lead->name }}</p>
                            <p>Email: {{ $lead->email }}</p>
                            <p>Contenuto: {{ $lead->message }}</p>
                            @foreach ($apartments as $apartment)
                                @if ($lead->apartment_id == $apartment->id)
                                    <p>Il messaggio si riferisce all'appartamento: {{ $apartment->name }}</p>
                                @endif
                            @endforeach
                        </div>
                        <div class="col my-btn d-flex align-items-end justify-content-center flex-column my-btn">
                            <form action="{{ route('admin.message.destroy', $lead->id) }}" style="display: inline" class="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-2 my-btn">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
    @endforeach 
@endsection