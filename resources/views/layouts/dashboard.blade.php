<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- App.js -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- TomTom -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>

    <!-- BrainTree  -->
    <script src="https://js.braintreegateway.com/web/dropin/1.32.1/js/dropin.min.js"></script>

    <!-- Chartjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('vue.home') }}">BoolBnB</a>
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
           <!-- The sidebar -->
            <div class="sidebar">
                <a class="nav-link d-flex align-items-center" href="{{ route('admin.index') }}">
                    <i class="fab fa-windows pr-2"></i>
                    Dashboard
                </a>
                <a class="nav-link d-flex align-items-center" href="{{ route('admin.apartments.index') }}">
                    <i class="fas fa-house-user pr-2"></i>
                    I miei appartamenti
                </a>
                <a class="nav-link d-flex align-items-center" href="{{ route('admin.message.index') }}">
                    <i class="fas fa-envelope pr-2"></i>
                    I tuoi messaggi
                </a>
                <a class="nav-link d-flex align-items-center" href="{{ route('admin.apartments.create') }}">
                    <i class="fas fa-plus-square pr-2"></i>
                    Nuovo appartamento
                </a>
                <a class="logout d-flex align-items-center" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt pr-2"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
                @yield('content')
                
            </main>  
            
        </div>
    </div>
    @include('partials.footer')
    @yield('script')
</body>
</html>