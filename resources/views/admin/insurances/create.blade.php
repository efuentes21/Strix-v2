<div class="container">
  <div class="row mt-4 mb-2">
    <div class="col-md-10">
        <h1>NEW INSURANCE</h1>
    </div>
    <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('insurance.index') }}" class="btn btn-danger">Cancel</a>
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
  <form action="{{ route('insurance.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="mb-3">
      <label for="cif" class="form-label">CIF</label>
      <input type="text" class="form-control" id="cif" name="cif" aria-describedby="cif-help">
      <div id="cif-help" class="form-text">Introduce the CIF of the insurance.</div>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help">
      <div id="name-help" class="form-text">Introduce the name of the insurance.</div>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="address-help">
      <div id="address-help" class="form-text">Introduce the insurance's address</div>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" aria-describedby="price-help" required>
      <div id="price-help" class="form-text">Set up the insurance's price.</div>
    </div>
    <div class="mb-3">
      <label for="active" class="form-label">Active</label>
      <select id="active" name="active" aria-describedby="active-help" class="form-select" aria-label="Select if the insurance is active or not" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
      <div id="active-help" class="form-text">Is the insurance active?</div>
    </div>

    <button type="submit" class="btn btn-primary text-white">Submit</button>
  </form>
</div>