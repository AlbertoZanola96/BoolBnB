<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue js</title>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- js -->
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    {{-- header  --}}
    @include('partials.header', compact('user'))

    {{-- vue app  --}}
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

     {{-- login modal --}}
     <div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="mt-2 d-flex justify-content-center align-items-center">
                    <h3 class="modal-title text-white" id="staticBackdropLabel">LOGIN</h3>
                </div>
                <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-center text-secondary">Please enter your login and password</p>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="text-white col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert E-Mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="text-white col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- remember me --}}
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-secondary" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                {{-- login button --}}
                                <button type="submit" class="modalbtn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            {{-- forgot password link --}}
                            @if (Route::has('password.request'))
                                <a href="" class="btn btn-link" onclick="$('#login').modal('hide')" data-toggle="modal" data-target="#resetpassword">Fotgot your password?</a>
                            @endif
                            {{-- register link --}}
                            <a href="" class="btn btn-link" onclick="$('#login').modal('hide')" data-toggle="modal" data-target="#register">Don't have an account? Sign up!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- register modal --}}
    <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="mt-2 d-flex justify-content-center align-items-center">
                    <h3 class="modal-title text-white" id="staticBackdropLabel">REGISTER</h3>
                </div>
                <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-center text-secondary">Create your account</p>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
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

                        {{-- surname --}}
                        <div class="form-group row">
                            <label for="surname" class="text-white col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert your surname" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
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

                        {{-- date of birth --}}
                        <div class="form-group row">
                            <label for="date_of_birth" class="text-white col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert your date of birth" id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="text-white col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- confirm password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="text-white col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                {{-- register button --}}
                                <button type="submit" class="modalbtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            {{-- login link --}}
                            <a href="" class="btn btn-link" onclick="$('#register').modal('hide')" data-toggle="modal" data-target="#login">Do you already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- reset password modal --}}
    <div class="modal fade" id="resetpassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="mt-2 d-flex justify-content-center align-items-center">
                    <h3 class="modal-title text-white" id="staticBackdropLabel">RESET PASSWORD</h3>
                </div>
                <button type="button" class="close text-white position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-center text-secondary">Enter your email to reset your password</p>
                <div class="modal-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="text-white col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Insert E-Mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                {{-- login button --}}
                                <button type="submit" class="modalbtn">
                                    {{ __('Send password reset link') }}
                                </button>
                            </div>
                            {{-- register link --}}
                            <a href="" class="btn btn-link" onclick="$('#resetpassword').modal('hide')" data-toggle="modal" data-target="#register">Do you remember password? Sign up!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>