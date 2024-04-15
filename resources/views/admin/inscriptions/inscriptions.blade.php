@section('inscriptions')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>INSCRIPTED COMPETITORS</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('qr.all', ['race' => $race]) }}" class="btn btn-primary text-white">PRINT DORSALS</a>
        </div>
    </div>

    <!-- Desktop and tablet -->
    <div class="row d-lg-block d-none">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th class="invisible">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td class="align-middle">{{ $data['id'] }}</td>
                        <td class="align-middle">{{ $data['dni'] }}</td>
                        <td class="align-middle">{{ $data['name'] }}</td>
                        <td class="align-middle">{{ $data['number'] }}</td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $data['dni'] }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $race->id }}">
                                    <li><a class="dropdown-item" href="{{ route('pdf.qr', ['race' => $race->id, 'competitor' => $data['id'], 'number' => $data['number']]) }}">Scan QR</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile -->
    <div class="row d-lg-none d-block">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Name</th>
                        {{-- <th>Number</th> --}}
                        <th class="invisible">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td class="align-middle">{{ $data['dni'] }}</td>
                        <td class="align-middle">{{ $data['name'] }}</td>
                        {{-- <td class="align-middle">{{ $data['number'] }}</td> --}}
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $data['dni'] }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $race->id }}">
                                    <li><a class="dropdown-item" href="{{ route('pdf.qr', ['race' => $race->id, 'competitor' => $data['id'], 'number' => $data['number']]) }}">Scan QR</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@show