<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Organizer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <nav class="nav nav-masthead justify-content-center">
                    @if (Route::has('login'))
                    @auth
                    <a class="main-nav-link nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                    
                    <a class="main-nav-link nav-link" href="{{ url('/home') }}">Events</a>

                    <a class="main-nav-link nav-link" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    <a class="main-nav-link nav-link" href="{{ route('register') }}">Sign Up</a>
                    @endif
                    @endauth

                    @endif
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover m-auto">
            <h1 class="cover-heading">Event Organizer</h1>
            <p class="lead"> information.</p>
            <p class="lead">
                <a href="{{ url('/about')}}" class="btn btn-lg btn-secondary">Learn more</a>
            </p>
        </main>
    </div>
</body>

</html>