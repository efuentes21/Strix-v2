<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($images as $image)
        @if($loop->first)
            <div class="carousel-item active">
                <img src="{{ asset('images/races/uploads/'.$image->image) }}" class="d-block w-100" style="max-height:70vh;" alt="Image from {{$race->name}} captured while during the race">
            </div>
        @else
            <div class="carousel-item">
                <img src="{{ asset('images/races/uploads/'.$image->image) }}" class="d-block w-100" style="max-height:70vh;" alt="Image from {{$race->name}} captured while during the race">
            </div>
        @endif
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>