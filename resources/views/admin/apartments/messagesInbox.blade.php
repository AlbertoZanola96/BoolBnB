@extends('layouts.dashboard')

@section('title')
    | Messaggi
@endsection

@section('content')
    <div id="messages" class="container">
        <div class="row">
            <div class="msg-pr col-12 col-md-12 col-lg-12 m-auto">
                @if (count($apartments) == 0)
                    <div class="card mt-5">
                        <div class="card-header"></div>
                        <a href="{{ route('admin.apartments.create') }}">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="d-flex justify-content-center mt-3">Non hai ancora nessun appartamento inserito.</p>
                                </blockquote>
                            </div>
                        </a>
                    </div>
                @else
                    @foreach ($apartments as $apartment)
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection