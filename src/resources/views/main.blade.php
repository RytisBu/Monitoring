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
<div id="app">

</div>
    @if (\Illuminate\Support\Facades\Auth::guest())

        @if(route('user.register') == Request::url())
            @include('authentication.registration')
        @else
            @include('authentication.login')
        @endif
    @else
        @include('partials.header')
        <div class="row">
            @include('sidebar')
            <div class="d-flex justify-content-center main-bar" style="position: absolute;">
                @if (!Auth::guest())
                    @yield('profile')
                @endif
            </div>
        </div>
        @include('partials/footer')
    @endif
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/main.js') }}"></script>--}}
</body>
</html>
