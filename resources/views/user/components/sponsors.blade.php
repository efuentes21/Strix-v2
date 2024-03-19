<div class="full bg-white">
    <div class="px-4 py-5 @yield('margin-sponsors') text-center d-flex flex-column justify-content-center">
        <h1 class="display-5 fw-bold">SPONSORS</h1>
        <hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
        <div class="col-lg-10 mx-auto">
            @foreach($sponsors as $sponsor)
                @if($loop->iteration % 4 == 1)
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center my-3">
                @endif
                    <div class="card race-banner" style="width: 10rem; height: 10em;">
                        <div class="card-body card-body-banner d-flex flex-col justify-content-center">
                            
                        </div>
                    </div>
                @if($loop->iteration % 4 == 0 || $loop->last)
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>