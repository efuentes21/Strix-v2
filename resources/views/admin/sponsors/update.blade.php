<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>EDIT SPONSOR</h1>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('sponsor.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- ['id' => $sponsor->id] --}}
    <form action="{{ route('sponsor.update', [$sponsor]) }}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cif" class="form-label">CIF</label>
            <input type="text" class="form-control" id="cif" name="cif" value="{{ $sponsor->cif }}" aria-describedby="cif-help">
            <div id="cif-help" class="form-text">Introduce the CIF of the sponsor.</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $sponsor->name }}" aria-describedby="name-help">
            <div id="name-help" class="form-text">Introduce the name of the sponsor.</div>
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" aria-describedby="logo-help">
            <div id="logo-help" class="form-text">Upload the sponsor's logo.</div>
            @if($sponsor->logo)
                <img src="{{ asset('images/' . $sponsor->logo) }}" alt="Sponsor Logo" style="max-width: 200px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $sponsor->address }}" aria-describedby="address-help">
            <div id="address-help" class="form-text">Introduce the sponsor's address</div>
        </div>
        <div class="mb-3">
            <label for="principal" class="form-label">Principal</label>
            <select id="principal" name="principal" aria-describedby="principal-help" class="form-select" aria-label="Select if the sponsor is principal or not" required>
                @if($sponsor->principal)
                <option value="1" selected>Yes</option>
                <option value="0">No</option>              
                @else
                <option value="1">Yes</option>
                <option value="0" selected>No</option>   
                @endif
            </select>
            <div id="active-help" class="form-text">Is the sponsor principal?</div>
          </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select id="active" name="active" aria-describedby="active-help" class="form-select" aria-label="Select if the sponsor is active or not" required>
                @if($sponsor->active)
                <option value="1" selected>Yes</option>
                <option value="0">No</option>              
                @else
                <option value="1">Yes</option>
                <option value="0" selected>No</option>   
                @endif
            </select>
            <div id="active-help" class="form-text">Is the sponsor active?</div>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
