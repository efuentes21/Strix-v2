<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lexend&family=Martian+Mono&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-utilities.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-docs.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @section('header')
    <header class="p-3 border-bottom bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                @include('layouts.assets.strix-logo')
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('races') }}" class="nav-link px-2 link-dark text-white">Races</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark text-white">Challenges</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark text-white">Media</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                @auth('competitor')
                <div class="dropdown text-end d-none d-sm-block">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-white" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small bg-dark" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item text-white" href="#">New project...</a></li>
                        <li><a class="dropdown-item text-white" href="#">Settings</a></li>
                        <li><a class="dropdown-item text-white" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider text-white"></li>
                        <li><a class="dropdown-item text-white" href="{{ route('user.logout') }}">Sign out</a></li>
                    </ul>
                </div>
                @else
                <div class="dropdown text-end d-none d-sm-block">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('resources/circle-user.svg') }}" alt="Settings" style="max-width: 32px;">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{ route('user.index') }}">Login</a></li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </header>
    @show
    <div class="col-12">
        @yield('content')
    </div>
</body>
</html>