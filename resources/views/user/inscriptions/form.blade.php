<div class="container">
    <div class="row mt-4 mb-2">
      <div class="col-md-10">
          <h1>NEW RACE</h1>
      </div>
      <div class="col-md-2 d-flex align-items-center justify-content-end">
          {{-- <a href="{{ route('inscription.index') }}" class="btn btn-danger">Cancel</a> --}}
          <a href="{{ route('race.inspection', ['race' => $race]) }}" class="btn btn-danger">Cancel</a>
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
    <form action="{{ route('inscription.store', ['race' => $race]) }}" method="POST" enctype="multipart/form-data" class="mb-3">
      @csrf
      <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" aria-describedby="dni-help" required>
        <div id="dni-help" class="form-text">Introduce your dni.</div>
      </div>
      {{-- <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" required>
        <div id="email-help" class="form-text">Introduce your email.</div>
      </div> --}}
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" required>
        <div id="name-help" class="form-text">Introduce your name and surname.</div>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="address-help" required>
        <div id="address-help" class="form-text">Introduce your address.</div>
      </div>
      <div class="mb-3">
        <label for="birthdate" class="form-label">Birth date</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" aria-describedby="birthdate-help" required>
        <div id="birthdate-help" class="form-text">Introduce your birthdate.</div>
      </div>
      <div class="mb-3">
        <label for="insurance" class="form-label">Insurance</label>
        <select id="insurance" name="insurance" aria-describedby="insurance-help" class="form-select" required>
          @foreach ($insurances as $insurance)
            <option value={{ $insurance->id }}>{{ strtoupper($insurance->name) }}</option>
          @endforeach
        </select>
        <div id="active-help" class="form-text">Select your insurance for the race</div>
      </div>
  
      <button type="submit" class="btn btn-primary text-white">Submit</button>
    </form>
  </div>