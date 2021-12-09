<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boolbnb @yield('title')</title>


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
    @include('partials.header', compact('user'))

    <!-- The sidebar -->
    <div class="sidebar mt-3">
        <a class="nav-link d-flex align-items-center" href="{{ route('admin.index') }}">
            <i class="far fa-user d-flex justify-content-center"></i>
            <span class="ml-2 d-lg-block">
                Dashboard
            </span>
        </a>
        <a class="nav-link d-flex align-items-center" href="{{ route('admin.apartments.index') }}">
            <i class="fas fa-home d-flex justify-content-center"></i>
            <span class="ml-2 d-lg-block">
                I miei appartamenti
            </span>
        </a>
        <a class="nav-link d-flex align-items-center" href="{{ route('admin.messages.index') }}">
            <i class="far fa-envelope d-flex justify-content-center"></i> 
            <span class="ml-2 d-lg-block">
                I tuoi messaggi
            </span>
        </a>
        <a class="nav-link d-flex align-items-center" href="{{ route('admin.apartments.create') }}">
            <i class="fas fa-plus d-flex justify-content-center"></i>
            <span class="ml-2 d-lg-block">
                Nuovo appartamento
            </span>
        </a>
        <a class="nav-link logout d-flex align-items-center" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt d-flex justify-content-center"></i>
            <span class="ml-2 d-lg-block">
                Logout
            </span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <main role="main" class="mx-auto mt-3 main-dashboard">
        @yield('content')
    </main>  

    @include('partials.footer')
    
    @yield('script')
</body>
</html>