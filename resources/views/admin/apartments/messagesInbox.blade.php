@extends('layouts.dashboard')

@section('content')
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @endif 

    <div id="messages" class="container-fluid">
        @foreach ($apartments as $apartment)
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="msg-box d-flex justify-content-between align-items-center my-2 px-3">
                        <div class="app-name">
                            {{ $apartment->name }}
                        </div>
                        <div class="msg-icon">
                            <a href="{{ route('admin.messages.show', $apartment->slug) }}">
                                <i class="far fa-envelope">
                                    @if (count($apartment->leads) > 0)
                                        <div class="msg-counter d-flex justify-content-center align-items-center">
                                            {{ count($apartment->leads) }}
                                        </div>
                                    @endif
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- @foreach ($apartmentsleads as $apartmentleads)
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
    @endforeach  --}}
@endsection