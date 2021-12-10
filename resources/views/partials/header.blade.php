<header class="container-fluid d-flex align-items-center">
    <div class="row w-100">
        <div class="col w-100 d-flex justify-content-between align-items-center">
            <div id="logo">
                Boolbnb
            </div>            


            <div class="btn-group">
                <button class="btn  btn-sm" type="button">
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
                                <a href="" class="btn btn-link" data-toggle="modal" data-target="#login">Login</a>
                                
                                @if (Route::has('register'))
                                    <a href="" class="btn btn-link" data-toggle="modal" data-target="#register">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </button>
                <button type="button" style="color: white" class="btn btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                @guest
                    <div class="dropdown-menu">
                        <ul>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ url('/search') }}">Ricerca avanzata</a>
                            </li>
                        </ul>
                    </div>  
                @else
                    <div class="dropdown-menu">
                        <ul>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ url('/admin') }}">Dashboard</a>
                            </li>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ url('/admin/apartments') }}">I miei appartamenti</a>
                            </li>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ url('/admin/messages') }}">I tuoi messaggi</a>
                            </li>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ url('/admin/create') }}">Nuovo appartamento</a>
                            </li>
                            <li>
                                <a style="color: gray" class="ml-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
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
        </div>
    </div>
</header>