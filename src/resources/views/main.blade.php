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
    @if (\Illuminate\Support\Facades\Auth::guest())
        @if(route('user.register') == Request::url())
            @include('authentication.registration')
        @else
            @include('authentication.login')
        @endif
    @else
        @include('partials.header')
        <div class="row">
            @if(Route::current()->getName() == 'main')
                @include('homepage.main')
            @else
                @include('sidebar')
            @endif
            @if (!Auth::guest() && Route::current()->getName() != 'main')
                <div class="d-flex flex-column justify-content-center main-bar" style="position: absolute;">
                    @yield('main.content')
                </div>
            @endif
        </div>
        @include('partials/footer')
    @endif
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
