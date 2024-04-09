<h1 class="text-center fw-bold">CHALLENGES</h1>
<hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
@foreach($challenges as $challenge)
    @if($loop->iteration % 4 == 1)
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center my-3">
    @endif
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('resources/ring_traverse.png') }}" class="card-img-top" alt={{ $challenge->name }}>
                {{-- Cambiar foto cuando este implementado --}}
                {{-- <img src="{{ asset('images/' . $challenge->image) }}" class="card-img-top" alt={{ $challenge->name }}> --}}
                <div class="card-body">
                    <h1 class="card-title">{{ $challenge->name }}</h5>
                    <p class="card-text">{{ $challenge->description }}</p>
                </div>
            </div>
    @if($loop->iteration % 4 == 0 || $loop->last)
        </div>
    @endif
@endforeach