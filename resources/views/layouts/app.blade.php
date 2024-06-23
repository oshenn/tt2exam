<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OldWings</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="nav-container">
            <a href="/" class="logo">OldWings</a>
            <nav class="main-nav">
                <a href="{{ route('aircraft.index') }}">Planes</a>
                <a href="{{ route('events.index') }}">Events</a>
                {{--@guest
                    <a href="{{ route('login') }}">Login</a>
                @endguest
                @auth
                    <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                --}}
            </nav>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
