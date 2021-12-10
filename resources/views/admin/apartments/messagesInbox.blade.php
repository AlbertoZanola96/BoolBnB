@extends('layouts.dashboard')

@section('title')
    | Messaggi
@endsection

@section('content')
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
@endsection