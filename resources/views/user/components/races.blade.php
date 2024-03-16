<div class="full bg-white">
    <div class="px-4 py-5 my-5 text-center d-flex flex-col">
        <h1 class="display-5 fw-bold">RACES</h1>
        <hr class="border border-2 border-dark rounded w-25 justify-self-center">
        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                @foreach($races as $race)
                    <div>
                        <span>{{ $race->name }}</span>
                    </div>
                @endforeach
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
    </div>
</div>