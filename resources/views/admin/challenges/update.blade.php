<div class="container">
  <div class="row mt-4 mb-2">
    <div class="col-md-10">
        <h1>EDIT CHALLENGE</h1>
    </div>
    <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('challenge.index') }}" class="btn btn-danger">Cancel</a>
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
  <form action="{{ route('challenge.update', [$challenge]) }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $challenge->name) }}" aria-describedby="name-help" required>
      <div id="name-help" class="form-text">Introduce a name for the challenge.</div>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $challenge->description) }}" aria-describedby="description-help" required>
      <div id="description-help" class="form-text">Introduce a description for the challenge.</div>
    </div>
    <div class="mb-3">
      <label for="difficulty" class="form-label">Difficulty</label>
      <input type="number" class="form-control" id="difficulty" name="difficulty" value="{{ old('difficulty', $challenge->difficulty) }}" aria-describedby="difficulty-help" required>
      <div id="difficulty-help" class="form-text">Introduce a difficulty for the challenge.</div>
    </div>
    <div class="mb-3">
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" aria-describedby="image-help">
        <div id="image-help" class="form-text">Upload the challenge's image.</div>
        @if($challenge->image)
            <img src="{{ asset('images/' . $challenge->image) }}" alt="Challenge Logo" style="max-width: 200px;">
        @endif
    </div>
      <label for="active" class="form-label">Active</label>
      <select id="active" name="active" aria-describedby="active-help" class="form-select" aria-label="Select if the race is active or not" required>
        @if( old('active', $challenge->active) )
          <option value="1" selected>Yes</option>
          <option value="0">No</option>
        @else
          <option value="1">Yes</option>
          <option value="0" selected>No</option>
        @endif
      </select>
      <div id="active-help" class="form-text">Is the challenge active?</div>
    </div>

    <button type="submit" class="btn btn-primary text-white">Submit</button>
  </form>
</div>