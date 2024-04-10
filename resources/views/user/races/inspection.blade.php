<h1 class="text-center fw-bold">{{ strtoupper($race->name) }}</h1>
<hr class="border border-2 border-dark rounded w-25 mx-auto m-0 mb-3">
<div class="d-flex row mt-4 mb-2">
    <div class="col-md-9">
        <p>{{ $race->description }}</p>
    </div>
    <div class="col-md-3 d-flex justify-content-end px-0">
        @if ($competitors == $race->max_competitors)
            <button type="button" class="btn btn-outline-primary" disabled>INSCRIPTION</button>
        @else
            @auth('competitor')
                @if($inscriptionExist)
                    <button type="button" class="btn btn-outline-primary" disabled>INSCRIPTED</button>
                @else
                    {{-- <a href="{{ route('inscription.logged', ['race' => $race]) }}" class="btn btn-primary text-white">INSCRIPTION</a> --}}
                    {{-- falta estilo en el boton, esta chiquito --}}
                    <div id="paypal-button-container"></div>
                    <script src="{{ asset('js/paypal.js')}}"></script>
                    <script>
                        let price = parseFloat({{ $race->inscription }});
                        const route = "{{ route('inscription.logged', ['race' => $race]) }}";
                    </script>
                @endif
            @else
                <a href="{{ route('inscription.index', ['race' => $race]) }}" class="btn btn-primary text-white">INSCRIPTION</a>
            @endauth
        @endif
    </div>
</div>
<div class="d-flex row mt-4 mb-2 p-4 bg-light">
    <div class="col-md-6 d-flex flex-column justify-content-between">
        <p>Date: {{ $race->date }}</p>
        <p>Start: {{ $race->start }}</p>
        <p>Distance: {{ $race->distance }}km</p>
        <p>Unevenness: {{ $race->unevenness }}m</p>
        @auth('competitor')
            <p>Inscription's price: {{ $race->inscription }}€ (20% off)</p>
        @else
            <p>Inscription's price: {{ $race->inscription }}€</p>
        @endauth
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <img src="{{ asset('images/' . $race->map) }}" alt="Race Map" style="max-width: 450px;">
    </div>
</div>
