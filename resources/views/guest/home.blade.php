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
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        @include('partials.header')

        {{-- bg image --}}
        <div class="banner d-flex justify-content-center align-items-center">
            <div class="layover"></div>

            <div class="links">
                <a href="{{ route('index') }}" class="display-4 text-white font-weight-bold">Trova l'appartamento giusto per te</a>
            </div>
        </div>
    </body>
</html>
