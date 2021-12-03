<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ricerca</title>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- js -->
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    
    <div id="app">
        
    </div>

    {{-- message modal --}}
    <div class="modal fade" id="leads" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="mt-2 d-flex justify-content-center align-items-center">
                    <h3 class="modal-title text-white" id="staticBackdropLabel">Invia messaggio</h3>
                </div>
                <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <form method="POST" action="">
                        @csrf

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="text-white col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert your name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="text-white col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert E-Mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- messaggio --}}
                        <div class="form-group row">
                            <label for="message" class="text-white col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea placeholder="Insert message" name="message" id="message" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" required autocomplete="message">{{ old('message') }}</textarea>

                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                {{-- send message button --}}
                                <button type="submit" class="modalbtn">
                                    Send message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>