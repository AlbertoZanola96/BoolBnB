
<header class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navigation navbar-expand-md navbar-dark">
                <div id="logo">
                    <a href="/">
                        <img src="{{ asset('../images/logo.png') }}" alt="Logo Boolbnb">       
                    </a>
                </div>

                <!-- nav right  -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end dropdown" id="collapsibleNavbar">
                    @if (Route::has('login'))
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/admin/apartments') }}">
                                        <div class="loged d-flex align-items-center">
                                            <i class="far fa-user"></i>
                                            {{ $user->name . ' ' . $user->surname }}
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/admin/apartments') }}">I miei appartamenti</a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/admin/messages') }}">I tuoi messaggi</a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/admin/apartments/create') }}">Nuovo appartamento</a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/search') }}">Ricerca Avanzata</a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="nav-item login">
                                    <a href="" data-backdrop="true" data-toggle="modal" data-target="#login">Login</a>
                                </li>    
                                <li class="nav-item register">    
                                    @if (Route::has('register'))
                                        <a href="" data-backdrop="true" data-toggle="modal" data-target="#register">Register</a>
                                    @endif
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/search') }}">Ricerca avanzata</a>
                                </li>
                            @endauth
                        </ul>
                    @endif
                    <button type="button" style="color: white" class="row-dropdown btn btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @guest
                        <div class="dropdown-menu">
                            <ul>
                                <li>
                                    <a class="ml-3" href="{{ url('/search') }}">Ricerca avanzata</a>
                                </li>
                            </ul>
                        </div>  
                    @else
                        <div class="dropdown-menu">
                            <ul>
                                <li>
                                    <a class="ml-3" href="{{ url('/admin/apartments') }}">I miei appartamenti</a>
                                </li>
                                <li>
                                    <a class="ml-3" href="{{ url('/admin/messages') }}">I tuoi messaggi</a>
                                </li>
                                <li>
                                    <a class="ml-3" href="{{ url('/admin/apartments/create') }}">Nuovo appartamento</a>
                                </li>
                                <li class="nav-item visibility">
                                    <a href="{{ url('/search') }}">Ricerca Avanzata</a>
                                </li>
                                <li>
                                    <a class="ml-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>  
            </nav>            
        </div>
    </div>
</header> 