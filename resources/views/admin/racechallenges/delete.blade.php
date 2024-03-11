@section('racechallenges')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>RACE CHALLENGES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('racechallenge.index', ['race' => $race]) }}" class="btn btn-primary text-white">ADD CHALLENGES</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th class="invisible">R</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($racechallenges as $challenge)
                    <tr>
                        <td>{{ $challenge->id }}</td>
                        <td>{{ $challenge->name }}</td>
                        <td>{{ $challenge->description }}</td>
                        <td><a href="{{ route('racechallenge.remove', ['challenge' => $challenge, 'race' => $race]) }}">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show