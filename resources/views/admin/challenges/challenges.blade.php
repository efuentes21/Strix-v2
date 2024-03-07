@section('challenges')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>CHALLENGES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('challenge.create') }}" class="btn btn-primary text-white">ADD CHALLENGES</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challenges as $challenge)
                    <tr>
                        <td>{{ $challenge->id }}</td>
                        <td>{{ $challenge->name }}</td>
                        <td>{{ $challenge->description }}</td>
                        <td>{{ $challenge->active }}</td>
                        <td><a href="{{ route('challenge.edit', ['challenge' => $challenge]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show