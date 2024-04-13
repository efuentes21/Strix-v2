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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/buscadores.js') }}"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Ae5kzdpoZCdqBtQNEbgKpB1EBFkwznUL9XH1jgfdbi_MKo-OsJhrCIWt601Ia1R7ps465kx_8QwvKPR6&currency=EUR"></script>
</head>
<body class="@yield('body-class')">
    @section('header')
    <header class="p-3 border-bottom bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none" title="Main menu">
                @include('layouts.assets.strix-logo')
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('races') }}" class="nav-link px-2 link-dark text-white">Races</a></li>
                    <li><a href="{{ route('challenges') }}" class="nav-link px-2 link-dark text-white">Challenges</a></li>
                    <li><a href="{{ route('media') }}" class="nav-link px-2 link-dark text-white">Media</a></li>
                    <li><a href="{{ route('rankings') }}" class="nav-link px-2 link-dark text-white">Rankings</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" id="barra-busqueda" data-url="{{ route('races.search') }}">
                </form>

                @auth('competitor')
                <div class="dropdown text-end d-none d-sm-block">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-white" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" title="Profile dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path style="fill: white;" fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu text-small bg-dark" aria-labelledby="dropdownUser1" style="">
                        <!-- 
                        <li><a class="dropdown-item text-white" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider text-white"></li> 
                        -->
                        <li><a class="dropdown-item text-white" href="{{ route('user.logout') }}">Sign out</a></li>
                    </ul>
                </div>
                @else
                <div class="dropdown text-end d-none d-sm-block">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" title="Profile dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path style="fill: white;" d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path style="fill: white;" fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
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
    <div class="col-12" style="min-height: 69.8vh">
        @yield('content')
    </div>
    @include('user.components.footer')
</body>
</html>