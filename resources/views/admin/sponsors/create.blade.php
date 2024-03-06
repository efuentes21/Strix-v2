<div class="container">
  <div class="row mt-4 mb-2">
    <div class="col-md-10">
        <h1>NEW SPONSOR</h1>
    </div>
    <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('sponsor.index') }}" class="btn btn-danger">Cancel</a>
    </div>
  </div>
  <form action="{{ route('sponsor.store') }}" class="mb-3">
    @csrf
    <div class="mb-3">
      <label for="cif" class="form-label">CIF</label>
      <input type="text" class="form-control" id="cif" name="cif" aria-describedby="cif-help">
      <div id="cif-help" class="form-text">Introduce the CIF of the sponsor.</div>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="number" class="form-control" id="name" name="name" aria-describedby="name-help">
      <div id="name-help" class="form-text">Introduce the name of the sponsor.</div>
    </div>
    <div class="mb-3">
      <label for="logo" class="form-label">Logo</label>
      <input type="file" class="form-control" id="logo" name="logo" aria-describedby="logo-help">
      <div id="logo-help" class="form-text">Upload the sponsor's logo.</div>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" aria-describedby="address-help">
      <div id="address-help" class="form-text">Introduce the sponsor's address</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>