<div class="full bg-white">
    <div class="px-4 py-5 text-center d-flex flex-column justify-content-center">
        <h1 class="text-center fw-bold">CHALLENGES</h1>
        <hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
        @if($challenges != null && count($challenges) > 0)
            @foreach($challenges as $challenge)
                @if($loop->iteration % 4 == 1)
                    <div class="d-grid gap-3 d-sm-flex justify-content-center my-3">
                @endif
                        <div class="card" style="width: 14rem; height: 18rem;">
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
        @else
            <h1 class="display-8">NO CHALLENGES FOUND</h1>
        @endif
    </div>
</div>