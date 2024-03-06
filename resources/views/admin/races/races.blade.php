@section('races')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>RACES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('race.create') }}" class="btn btn-primary">ADD RACE</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Desnivel</th>
                        <th>Competidores</th>
                        <th>Distancia</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Inscripción</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show