<header class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navigation navbar-expand-md navbar-dark">
                <div id="logo">
                    <a href="/">
                        <img src="{{ asset('../images/logo.png') }}" alt="Logo Boolbnb">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end dropdown" id="collapsibleNavbar">
                    @if (Route::has('login'))
                        <ul class="navbar-nav">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/admin') }}">
                                    <div class="loged d-flex align-items-center">
                                        <i class="far fa-user"></i>
                                        {{ $user->name . ' ' . $user->surname }}
                                    </div>
                                </a>
                            </li>
                            @else
                            <li class="nav-item login">
                                <a href="" data-backdrop="true" data-toggle="modal" data-target="#login">Login</a>
                            </li>    
                            <li class="nav-item">    
                                @if (Route::has('register'))
                                    <a href="" data-backdrop="true" data-toggle="modal" data-target="#register">Register</a>
                                @endif
                            </li>
                            @endauth
                        </ul>
                    @endif
                </div>  
              </nav>
        </div>
    </div>
</header> 