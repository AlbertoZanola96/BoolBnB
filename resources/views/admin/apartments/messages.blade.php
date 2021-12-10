@extends('layouts.dashboard')

@section('title')
    | Messaggi
@endsection

@section('content')
    <div id="single-apartment" class="container mb-2">
        @if (session('deleted'))
            <div class="alert alert-danger">
                {{ session('deleted') }}
            </div>
        @endif 

        <!-- case no msg -->
        @if(count($leads) == 0)
            <div class="row">
                <div class="col-10 mx-auto p-4 no-msg d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('../images/no_message.png') }}" alt="Envelope">
                    <h4 class="info mb-4">
                        Nessun messaggio per questo appartamento!
                    </h4>
                </div>
            </div>
        @else
            <!-- case messages -->
            @foreach ($leads as $lead)
                <div class="row">
                    <div class="col-8 mx-auto single-msg my-3 p-3">
                        <!-- name -->
                        <div class="guest-name">
                            {{ $lead->name }}
                        </div>
                        <!-- email -->
                        <div class="guest-email pb-4">
                            {{ $lead->email }}
                        </div>
                        <!-- message -->
                        <div class="guest-msg mb-4 pr-2 text-truncate">
                            {{ $lead->message }}
                        </div>
                        <i class="fas fa-chevron-down show-msg"></i>
                        <!-- icon -->
                        <form action="{{ route('admin.messages.destroy', $lead->id) }}" class="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection