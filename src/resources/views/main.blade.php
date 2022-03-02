<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if (!\Illuminate\Support\Facades\Auth::guest())
        @yield('login')
    @endif

    @if(\Illuminate\Support\Facades\Auth::guest())
        @include('partials.header')
        @include('sidebar')

        <div class="container">

        </div>
    @endif

    {{--    @include('authentication.login')--}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
