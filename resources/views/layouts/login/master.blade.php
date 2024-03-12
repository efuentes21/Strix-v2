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
    <main class="container-fuild">
        <div class="row h-100 full">
            @section('login')
                <div id="backgound-login" class="col-6"></div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div>
                        <div class="row mt-3 mb-3 container">
                            <h1>LOG IN</h1>
                        </div>
                        <div class="row mt-3 mb-3 container">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="@yield('route-user')" method="POST" enctype="multipart/form-data" class="mb-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" required>
                                    <div id="email-help" class="form-text">Introduce an email of an admin's account.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help" required>
                                    <div id="password-help" class="form-text">Introduce the password</div>
                                </div>
                                <button type="submit" class="btn btn-primary text-white">LOGIN</button>
                            </form>
                            {{-- @if($client) --}}
                                <div class="mb-3">
                                    <div id="route-signup"><a href="#">Not registered yet?</a></div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            @show
        </div>
    </main>

</body>