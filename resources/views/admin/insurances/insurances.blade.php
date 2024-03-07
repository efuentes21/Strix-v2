@section('insurances')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>INSURANCES</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('insurance.create') }}" class="btn btn-primary text-white">ADD INSURANCE</a>
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
                        <th>Price</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insurances as $insurance)
                    <tr>
                        <td>{{ $insurance->cif }}</td>
                        <td>{{ $insurance->name }}</td>
                        <td>{{ $insurance->address }}</td>
                        <td>{{ $insurance->price }}€</td>
                        <td><a href="{{ route('insurance.edit', ['insurance' => $insurance]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@show