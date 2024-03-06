@section('competitors')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>COMPETITORS</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('competitor.create') }}" class="btn btn-primary">ADD COMPETITORS</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Pro</th>
                        <th>Partner</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competitors as $competitor)
                    <tr>
                        <td>{{ $competitor->dni }}</td>
                        <td>{{ $competitor->name }}</td>
                        <td>{{ $competitor->address }}</td>
                        <td>{{ $competitor->pro }}</td>
                        <td>{{ $competitor->partner }}</td>
                        <td>{{ $competitor->active }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show