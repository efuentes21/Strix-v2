@section('raceinsurances')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>RACE INSURANCES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('raceinsurance.indexadd', ['race' => $race]) }}" class="btn btn-primary text-white">ADD INSURANCES</a>
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
                        <th class="invisible">R</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($raceinsurances as $insurance)
                    <tr>
                        <td>{{ $insurance->cif }}</td>
                        <td>{{ $insurance->name }}</td>
                        <td>{{ $insurance->address }}</td>
                        <td><a href="{{ route('raceinsurance.remove', ['insurance' => $insurance, 'race' => $race]) }}">Remove</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if($noRecord)
        <div class="row">
            <p>No insurances found!</p>
        </div>
    @endif
</div>
@show