<header class="container-fluid d-flex align-items-center">
    <div class="row w-100">
        <div class="col w-100 d-flex justify-content-between">
                <div class="logo-img">
                    
                </div>
            </div>

            @if (Route::has('login'))
                <div class="input-right">
                    @auth
                        <a href="{{ url('/admin') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>