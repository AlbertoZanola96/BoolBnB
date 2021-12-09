<header class="container-fluid d-flex align-items-center">
    <div class="row w-100">
        <div class="col w-100 d-flex justify-content-between align-items-center">
            <div id="logo">
                Boolbnb
            </div>            

            @if (Route::has('login'))
                <div class="input-right">
                    @auth
                        <a href="{{ url('/admin') }}">
                            <div class="loged d-flex align-items-center">
                                <i class="far fa-user"></i>
                                {{ $user->name . ' ' . $user->surname }}
                            </div>
                        </a>
                    @else
                        <a href="" class="btn btn-link" data-toggle="modal" data-target="#login" data-backdrop="true">Login</a>
                        
                        
                        @if (Route::has('register'))
                            <a href="" class="btn btn-link" data-toggle="modal" data-target="#register" data-backdrop="true">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>