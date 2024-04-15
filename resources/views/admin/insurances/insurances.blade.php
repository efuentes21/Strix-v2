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

    <!-- Desktop and tablet -->
    <div class="row d-lg-block d-none">
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
                        <td class="align-middle">{{ $insurance->cif }}</td>
                        <td class="align-middle">{{ $insurance->name }}</td>
                        <td class="align-middle">{{ $insurance->address }}</td>
                        <td class="align-middle">{{ $insurance->price }}€</td>
                        <td class="align-middle"><a href="{{ route('insurance.edit', ['insurance' => $insurance]) }}">Edit</a></td>
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
                        <th>CIF</th>
                        <th>Name</th>
                        <th class="invisible">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insurances as $insurance)
                    <tr>
                        <td class="align-middle">{{ $insurance->cif }}</td>
                        <td class="align-middle">{{ $insurance->name }}</td>
                        <td class="align-middle"><a href="{{ route('insurance.edit', ['insurance' => $insurance]) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@show