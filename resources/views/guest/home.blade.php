<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- js -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        @include('partials.header')
        
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
                                    <button type="submit" class="loginbtn">
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
                                    <button type="submit" class="registerbtn">
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
                                    <button type="submit" class="resetbtn">
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

        {{-- bg image --}}
        <div class="banner d-flex flex-column align-items-center">
            <div class="layover"></div>

            <div class="logo row justify-content-center">
                <div class="col-5 d-flex flex-column align-items-center">
                    <img src="../img/banner-2.jpg" alt="logo">
                    <h3 class="text-justify">Il sito n.1 per trovare la casa perfetta per te</h3>
                </div>
            </div>

            <div class="links">
                <a href="{{ route('index') }}" class="display-4 text-white font-weight-bold">Trova l'appartamento giusto per te</a>
            </div>
        </div>

        <div class="apartments container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title text-center mt-5">I nostri migliori appartamenti</h1>
                    <ul>
                        {{-- @foreach ($apartments as $apartment) --}}
                            <li>
                                <div class="apartment-container mt-5">
                                    <div class="apartment-image float-left">
                                        <img src="../img/banner-2.jpg" alt="Foto appartamento sponsorizzato">
                                    </div>
                                    <div class="apartment-description pl-4 float-left">
                                        <h2>Appartamento name</h2>
                                        <p>Citta, indirizzo</p>
                                        <p>Descrizione</p>
                                        <p>Numero camere</p>
                                        <p>Numero letti</p>
                                        <p>Numero bagni</p>
                                        <p>Grandezza</p>
                                    </div>
                                </div>
                            </li>
                        {{-- @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
