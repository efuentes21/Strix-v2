@section('insurances')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>INSURANCES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('insurance.create') }}" class="btn btn-primary">ADD INSURANCE</a>
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
                    @foreach ($insurances as $insurance)
                    <tr>
                        <td>{{ $insurance->id }}</td>
                        <td>{{ $insurance->desnivel }}</td>
                        <td>{{ $insurance->competidores }}</td>
                        <td>{{ $insurance->distancia }}</td>
                        <td>{{ $insurance->fecha }}</td>
                        <td>{{ $insurance->hora }}</td>
                        <td>{{ $insurance->inscripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show