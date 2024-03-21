<div class="full bg-white">
    <div class="px-4 py-5 text-center d-flex flex-column justify-content-center">
        <h1 class="display-5 fw-bold">RACES</h1>
        <hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
        <div class="col-lg-10 mx-auto">
            @foreach($races as $race)
                @if($loop->iteration % 4 == 1)
                <section class="d-grid gap-3 d-sm-flex justify-content-sm-center my-3">
                @endif
                    <article class="relative race-link">
                        <a href="{{ route('race.inspection', ['race' => $race->id]) }}" class="race-link">
                            <div class="card race-banner" style="background-image: url({{ asset('images/'.$race->promotion ) }});">
                                
                            </div>
                            <div class="card-body card-body-banner d-flex flex-col justify-content-center">
                                <h1 class="card-title text-white text-center">{{ $race->name }}</h1>
                                <h2 class="card-date text-white text-center">{{ $race->date->format('d-m-Y') }}</h2>
                            </div>
                        </a>
                    </article>
                @if($loop->iteration % 4 == 0 || $loop->last)
                </section>
                @endif
            @endforeach
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('races') }}" class="btn btn-black btn-lg px-4 gap-3">See more...</a>
            </div>
        </div>
    </div>
</div>