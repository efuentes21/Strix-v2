@section('competitors')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>COMPETITORS</h1>
        </div>
        {{-- <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('competitor.create') }}" class="btn btn-primary text-white">ADD COMPETITORS</a>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Pro</th>
                        <th>Partner</th>
                        <th>Active</th>
                        <th>Ticket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competitors as $competitor)
                    <tr>
                        <td class="align-middle">{{ $competitor->dni }}</td>
                        <td class="align-middle">{{ $competitor->email }}</td>
                        <td class="align-middle">{{ $competitor->name }}</td>
                        <td class="align-middle">{{ $competitor->address }}</td>
                        <td class="align-middle">{{ $competitor->pro }}</td>
                        <td class="align-middle">{{ $competitor->partner }}</td>
                        <td class="align-middle">{{ $competitor->active }}</td>
                        <td><a href="{{ route('competitor.print', ['competitor' => $competitor]) }}">Ticket</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show