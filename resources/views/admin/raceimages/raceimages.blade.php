@section('raceimages')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-10">
            <h1>RACE IMAGES</h1>
        </div>
        @if(strtotime($race->date) < strtotime(now()))
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('raceimages.add', ['race' => $race]) }}" class="btn btn-primary text-white">UPLOAD IMAGES</a>
        </div>
        @endif
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
    @if(strtotime($race->date) < strtotime(now()))
      @if(count($images) > 0)
      <div class="row">
        <div class="col-md-12">
          @include('admin.raceimages.carrousel')
      </div>
    @else
      <div class="row">
        <div class="col-md-12">
          <p>No media uploaded yet!</p>
        </div>
      </div>
    @endif
  @else
    <div class="row">
      <div class="col-md-12">
        <p>This race didn't celebrate yet!</p>
      </div>
    </div>
  @endif
@show