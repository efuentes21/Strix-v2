@section('sponsors')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>SPONSORS</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('sponsor.create') }}" class="btn btn-primary text-white">ADD SPONSORS</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CIF</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th>Principal</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $sponsor)
                    <tr>
                        <td>{{ $sponsor->cif }}</td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->address }}</td>
                        <td class="text-center"><img src="{{ asset('images/' . $sponsor->logo) }}" alt="Sponsor Logo" style="max-width: 50px;"></td>
                        @if($sponsor->principal)
                            <td class="text-center"><img src="{{ asset('images/verde.png') }}" alt="true" style="max-width: 50px;"></td>
                        @else
                            <td class="text-center"><img src="{{ asset('images/rojo.png') }}" alt="false" style="max-width: 50px;"></td>
                        @endif
                        <td><a href="{{ route('sponsor.edit', ['sponsor' => $sponsor]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show