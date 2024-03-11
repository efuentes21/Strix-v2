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
    <!--
    @if(false)
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Unevenness</th>
                        <th>Competitors</th>
                        <th>Distance</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Inscription</th>
                        <th>Active</th>
                        <th class="invisible">Add challenges</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($races as $race)
                    <tr>
                        <td>{{ $race->id }}</td>
                        <td>{{ $race->unevenness }}</td>
                        <td>{{ $race->max_competitors }}</td>
                        <td>{{ $race->distance }}</td>
                        <td>{{ $race->date }}</td>
                        <td>{{ $race->time }}</td>
                        <td>{{ $race->inscription }}€</td>
                        <td>{{ $race->active }}</td>
                        <td><a href="{{ route('racechallenge.index', ['race' => $race]) }}">Challenges</a></td>
                        <td><a href="{{ route('race.edit', ['race' => $race]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show