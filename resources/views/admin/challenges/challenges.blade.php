@section('challenges')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>CHALLENGES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('challenge.create') }}" class="btn btn-primary">ADD CHALLENGES</a>
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
                    @foreach ($challenges as $challenge)
                    <tr>
                        <td>{{ $challenge->id }}</td>
                        <td>{{ $challenge->desnivel }}</td>
                        <td>{{ $challenge->competidores }}</td>
                        <td>{{ $challenge->distancia }}</td>
                        <td>{{ $challenge->fecha }}</td>
                        <td>{{ $challenge->hora }}</td>
                        <td>{{ $challenge->inscripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show