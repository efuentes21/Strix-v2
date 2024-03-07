<div class="container">
  <div class="row mt-4 mb-2">
    <div class="col-md-10">
        <h1>NEW RACE</h1>
    </div>
    <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('race.index') }}" class="btn btn-danger">Cancel</a>
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
  <form action="{{ route('race.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" aria-describedby="description-help" required>
      <div id="description-help" class="form-text">Introduce a description for the race.</div>
    </div>
    <div class="mb-3">
      <label for="unevenness" class="form-label">Unevenness</label>
      <input type="number" class="form-control" id="unevenness" name="unevenness" aria-describedby="unevenness-help" required>
      <div id="unevenness-help" class="form-text">How much unevenness does the race have?</div>
    </div>
    <div class="mb-3">
      <label for="map" class="form-label">Map</label>
      <input type="file" class="form-control" id="map" name="map" aria-describedby="map-help" required>
      <div id="map-help" class="form-text">Upload the race map.</div>
    </div>
    <div class="mb-3">
      <label for="max-competitors" class="form-label">Max competitors</label>
      <input type="number" class="form-control" id="max-competitors" name="max_competitors" aria-describedby="max-competitors-help" required>
      <div id="max-competitors-help" class="form-text">How many competitors can participate at most?</div>
    </div>
    <div class="mb-3">
      <label for="distance" class="form-label">Distance</label>
      <input type="number" class="form-control" id="distance" name="distance" aria-describedby="distance-help" required>
      <div id="distance-help" class="form-text">How long is the race in kilometers?</div>
    </div>
    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" class="form-control" id="date" name="date" aria-describedby="date-help" required>
      <div id="date-help" class="form-text">Enter the date of the race.</div>
    </div>
    <div class="mb-3">
      <label for="time" class="form-label">Time</label>
      <input type="time" class="form-control" id="time" name="time" aria-describedby="time-help" required>
      <div id="time-help" class="form-text">Introduce a time for the race to start.</div>
    </div>
    <div class="mb-3">
      <label for="start" class="form-label">Start</label>
      <input type="text" class="form-control" id="start" name="start" aria-describedby="start-help" required>
      <div id="start-help" class="form-text">Introduce the race starting point address.</div>
    </div>
    <div class="mb-3">
      <label for="promotion" class="form-label">Promotion</label>
      <input type="file" class="form-control" id="promotion" name="promotion" aria-describedby="promotion-help" required>
      <div id="promotion-help" class="form-text">Upload the race promotion banner.</div>
    </div>
    <!--
    <div class="mb-3">
      <label for="sponsorship" class="form-label">Sponsorship</label>
      <input type="number" class="form-control" id="sponsorship" name="sponsorship" aria-describedby="sponsorship-help" required>
      <div id="sponsorship-help" class="form-text">Select the sponsors for the race.</div>
    </div>
    -->
    <div class="mb-3">
      <label for="inscription" class="form-label">Inscription</label>
      <input type="number" class="form-control" id="inscription" name="inscription" aria-describedby="inscription-help" required>
      <div id="inscription-help" class="form-text">Set up the race inscription price.</div>
    </div>
    <div class="mb-3">
      <label for="active" class="form-label">Active</label>
      <select id="active" name="active" aria-describedby="active-help" class="form-select" aria-label="Select if the race is active or not" required>
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
      </select>
      <div id="active-help" class="form-text">Is the race active?</div>
    </div>

    <button type="submit" class="btn btn-primary text-white">Submit</button>
  </form>
</div>