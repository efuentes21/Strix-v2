@section('sponsors')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>SPONSORS</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('sponsor.create') }}" class="btn btn-primary text-white">ADD SPONSORS</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Desktop and tablet -->
    <div class="row d-lg-block d-none">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CIF</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Principal</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                    <tr>
                        <td class="align-middle">{{ $sponsor->cif }}</td>
                        <td class="align-middle">{{ $sponsor->name }}</td>
                        <td class="align-middle">{{ $sponsor->address }}</td>
                        @if($sponsor->principal)
                            <td class="text-center align-middle"><img src="{{ asset('resources/verde.png') }}" alt="true" style="max-width: 50px;"></td>
                        @else
                            <td class="text-center align-middle"><img src="{{ asset('resources/rojo.png') }}" alt="false" style="max-width: 50px;"></td>
                        @endif
                        {{-- <td class="align-middle"><a href="{{ route('sponsor.edit', ['sponsor' => $sponsor]) }}">Edit</a></td> --}}
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $sponsor->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $sponsor->id }}">
                                    <li><a class="dropdown-item" href="{{ route('sponsor.edit', ['sponsor' => $sponsor]) }}">Edit</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('sponsorship.print', ['sponsor' => $sponsor]) }}">Print sponsors</a></li>
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
                        <th>CIF</th>
                        <th>Name</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                    <tr>
                        <td class="align-middle">{{ $sponsor->cif }}</td>
                        <td class="align-middle">{{ $sponsor->name }}</td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $sponsor->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $sponsor->id }}">
                                    <li><a class="dropdown-item" href="{{ route('sponsor.edit', ['sponsor' => $sponsor]) }}">Edit</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('sponsorship.print', ['sponsor' => $sponsor]) }}">Print sponsors</a></li>
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