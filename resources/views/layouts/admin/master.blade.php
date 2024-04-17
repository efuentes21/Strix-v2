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
    <script src="{{ asset('js/dragabbleForm.js') }}"></script>
    <script src="{{ asset('js/draggableChallenges.js') }}"></script>
</head>
<body>
    <main class="container-fuild h-100">
        <div class="row h-100 full">
            @section('dashboard')

            <!-- Desktop and tablet -->
            <div class="col-2 sidebar bg-dark d-xl-block d-none"></div>
            <aside class="col-2 bg-dark sidebar d-xl-block d-none position-fixed">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 290px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Dashboard</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="/admin/races" class="nav-link text-white @yield('active-races')" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Races
                            </a>
                        </li>
                        <li>
                            <a href="/admin/sponsors" class="nav-link text-white @yield('active-sponsors')">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Sponsors
                            </a>
                        </li>
                        <li>
                            <a href="/admin/insurances" class="nav-link text-white @yield('active-insurances')">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                            Insurances
                            </a>
                        </li>
                        <li>
                            <a href="/admin/challenges" class="nav-link text-white @yield('active-challenges')">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Challenges
                            </a>
                        </li>
                        <li>
                            <a href="/admin/competitors" class="nav-link text-white @yield('active-competitors')">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Competitors
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path style="fill: white;" fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                            <strong>Administrator</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Mobile -->
            <div class="col-sm-1 col-2 sidebar bg-dark d-xl-none d-block"></div>
            <aside class="col-sm-1 col-2 bg-dark sidebar d-xl-none d-block position-fixed">
                <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="width: 4.5rem;">
                    <a href="#" class="d-block p-2 link-body-emphasis text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                        @include('layouts.assets.strix-logo')
                    </a>
                    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                      <li class="nav-item">
                        <a href="/admin/races" class="nav-link py-3 border-bottom rounded-0 @yield('active-races')" aria-current="page" title="Races" data-bs-toggle="tooltip" data-bs-placement="right">
                          <img src="{{ asset('images/bandera-a-cuadros.png') }}">
                        </a>
                      </li>
                      <li>
                        <a href="/admin/sponsors" class="nav-link py-3 border-bottom rounded-0 @yield('active-sponsors')" title="Sponsors" data-bs-toggle="tooltip" data-bs-placement="right">
                            <img src="{{ asset('images/dolar-de-saco.png') }}">
                        </a>
                      </li>
                      <li>
                        <a href="/admin/insurances" class="nav-link py-3 border-bottom rounded-0 @yield('active-insurances')" title="Insurances" data-bs-toggle="tooltip" data-bs-placement="right">
                            <img src="{{ asset('images/medico.png') }}">
                        </a>
                      </li>
                      <li>
                        <a href="/admin/challenges" class="nav-link py-3 border-bottom rounded-0 @yield('active-challenges')" title="Challenges" data-bs-toggle="tooltip" data-bs-placement="right">
                            <img src="{{ asset('images/correr.png') }}">
                        </a>
                      </li>
                      <li>
                        <a href="/admin/competitors" class="nav-link py-3 border-bottom rounded-0 @yield('active-competitors')" title="Competitors" data-bs-toggle="tooltip" data-bs-placement="right">
                            <img src="{{ asset('images/usuarios.png') }}">
                        </a>
                      </li>
                    </ul>
                    <div class="dropdown border-top">
                      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path style="fill: white;" fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                      </a>
                      <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Sign out</a></li>
                      </ul>
                    </div>
                  </div>
            </aside>
            @show

            <div class="col-10 col-sm-11 col-lg-10 container" style="min-height: 100vh;">
                @yield('content')
            </div>
        </div>

    </main>
</body>
</html>