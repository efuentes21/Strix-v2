<div class="full bg-white">
    <div class="px-4 py-5 my-5 text-center d-flex flex-column justify-content-center">
        <h1 class="display-5 fw-bold">RACES</h1>
        <hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
        <div class="col-lg-10 mx-auto">
            @foreach($races as $race)
                @if($loop->iteration % 4 == 1)
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center my-3">
                @endif
                    <div class="card race-banner" style="width: 14rem; height: 18em; background-image: url({{ asset('images/'.$race->promotion ) }});">
                        <div class="card-body card-body-banner d-flex flex-col justify-content-center">
                            <h4 class="card-title text-white text-center">{{ $race->name }}</h4>
                        </div>
                    </div>
                @if($loop->iteration % 4 == 0 || $loop->last)
                </div>
                @endif
            @endforeach
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-black btn-lg px-4 gap-3">See more...</button>
            </div>
        </div>
    </div>
</div>