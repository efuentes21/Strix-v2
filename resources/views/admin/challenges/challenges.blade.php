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

    <!-- Desktop and tablet -->
    <div class="row d-lg-block d-none">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Difficutly</th>
                        <th>Active</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challenges as $challenge)
                    <tr>
                        <td class="align-middle">{{ $challenge->name }}</td>
                        <td class="align-middle">{{ $challenge->description }}</td>
                        <td class="align-middle">{{ $challenge->difficulty }}</td>
                        <td class="align-middle">{{ $challenge->active }}</td>
                        <td class="align-middle"><a href="{{ route('challenge.edit', ['challenge' => $challenge]) }}">Edit</a></td>
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
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challenges as $challenge)
                    <tr>
                        <td class="align-middle">{{ $challenge->name }}</td>
                        <td class="align-middle">{{ $challenge->active }}</td>
                        <td class="align-middle"><a href="{{ route('challenge.edit', ['challenge' => $challenge]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@show