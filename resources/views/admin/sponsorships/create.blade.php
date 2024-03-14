@section('sponsorship')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>ADD SPONSORS TO RACE</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('sponsorship.index', ['race' => $race]) }}" class="btn btn-primary text-white">REMOVE SPONSORS</a>
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
                        <th>CIF</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th class="invisible">A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                    <tr>
                        <td class="align-middle">{{ $sponsor->cif }}</td>
                        <td class="align-middle">{{ $sponsor->name }}</td>
                        <td class="align-middle">{{ $sponsor->address }}</td>
                        <td class="text-center align-middle"><img src="{{ asset('resources/' . $sponsor->logo) }}" alt="Sponsor Logo" style="max-width: 50px;"></td>
                        <td class="align-middle"><a href="{{ route('sponsorship.add', ['sponsor' => $sponsor, 'race' => $race]) }}">Add</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if($noRecord)
    <div class="row">
        <p>No sponsors found!</p>
    </div>
    @endif
</div>
@show