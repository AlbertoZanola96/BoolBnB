<header class="container-fluid d-flex align-items-center">
    <div class="row w-100">
        <div class="col w-100 d-flex justify-content-between align-items-center">
            <div id="logo">
                Boolbnb
            </div>            

            @if (Route::has('login'))
                <div class="input-right">
                    @auth
                        <a href="{{ url('/admin') }}">Admin</a>
                    @else
                        <a href="" class="btn btn-link" data-toggle="modal" data-target="#login">Login</a>
                        
                        
                        @if (Route::has('register'))
                            <a href="" class="btn btn-link" data-toggle="modal" data-target="#register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>