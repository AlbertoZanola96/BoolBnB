<header class="container-fluid d-flex align-items-center">
    <div class="row w-100 h-100 d-flex justify-content-between align-items-center">
        <!-- nav left  -->
        <div class="col-4">
            lalal
        </div>

        <!-- logo -->
        <div id="logo" class="col-4 text-center">
            <img src="{{ asset('../images/logo.png') }}" alt="">
        </div>    

        <!-- nav right  -->
        @if (Route::has('login'))
            <div class="input-right col-4 d-flex justify-content-end">
                @auth
                    <a href="{{ url('/admin') }}">
                        <div class="loged d-flex align-items-center">
                            <i class="far fa-user"></i>
                            {{ $user->name . ' ' . $user->surname }}
                        </div>
                    </a>
                @else
                    <a href="" class="btn btn-link" data-toggle="modal" data-target="#login">Login</a>
                    
                    
                    @if (Route::has('register'))
                        <a href="" class="btn btn-link" data-toggle="modal" data-target="#register">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>