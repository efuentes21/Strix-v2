@section('races')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>RACES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('race.create') }}" class="btn btn-primary text-white">ADD RACE</a>
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
                        <th>Name</th>
                        <th>Unevenness</th>
                        <th>Competitors</th>
                        <th>Distance</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Inscription</th>
                        <th>Active</th>
                        <th class="invisible">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($races as $race)
                    <tr>
                        <td class="align-middle">{{ $race->name }}</td>
                        <td class="align-middle">{{ $race->unevenness }}</td>
                        <td class="align-middle">{{ $race->max_competitors }}</td>
                        <td class="align-middle">{{ $race->distance }}</td>
                        <td class="align-middle">{{ $race->date }}</td>
                        <td class="align-middle">{{ $race->time }}</td>
                        <td class="align-middle">{{ $race->inscription }}€</td>
                        <td class="align-middle">{{ $race->active }}</td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $race->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $race->id }}">
                                    <li><a class="dropdown-item" href="{{ route('race.edit', ['race' => $race]) }}">Edit</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('racechallenge.index', ['race' => $race]) }}">Challenges</a></li>
                                    <li><a class="dropdown-item" href="{{ route('sponsorship.index', ['race' => $race]) }}">Sponsors</a></li>
                                    <li><a class="dropdown-item" href="{{ route('raceinsurance.index', ['race' => $race]) }}">Insurances</a></li>
                                    <li><a class="dropdown-item" href="{{ route('inscriptions', ['race' => $race]) }}">Inscriptions</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('raceimages.index', ['race' => $race]) }}">Media</a></li>
                                    <li><a class="dropdown-item" href="{{ route('qr.all', ['race' => $race]) }}">Print numbers</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('inscription.print', ['race' => $race]) }}">Print competitors</a></li>
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
                        <th>Name</th>
                        <th>Active</th>
                        <th class="invisible">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($races as $race)
                    <tr>
                        <td class="align-middle">{{ $race->name }}</td>
                        <td class="align-middle">{{ $race->active }}</td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1-{{ $race->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('resources/ajustes.svg') }}" alt="Settings" style="max-width: 25px;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1-{{ $race->id }}">
                                    <li><a class="dropdown-item" href="{{ route('race.edit', ['race' => $race]) }}">Edit</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('racechallenge.index', ['race' => $race]) }}">Challenges</a></li>
                                    <li><a class="dropdown-item" href="{{ route('sponsorship.index', ['race' => $race]) }}">Sponsors</a></li>
                                    <li><a class="dropdown-item" href="{{ route('raceinsurance.index', ['race' => $race]) }}">Insurances</a></li>
                                    <li><a class="dropdown-item" href="{{ route('inscriptions', ['race' => $race]) }}">Inscriptions</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('raceimages.index', ['race' => $race]) }}">Media</a></li>
                                    <li><a class="dropdown-item" href="{{ route('qr.all', ['race' => $race]) }}">Print numbers</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('inscription.print', ['race' => $race]) }}">Print competitors</a></li>
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