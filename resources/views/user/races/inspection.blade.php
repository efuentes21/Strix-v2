<div>
    <h1 class="text-center">{{ strtoupper($race->name) }}</h1>
    <div class="d-flex row mt-4 mb-2 ms-5 me-5">
        <div class="col-md-9">
            <p>{{ $race->description }}</p>
        </div>
        <div class="col-md-3">
            {{-- <a href="{{ route('race.inscription') }}" class="btn btn-primary text-white">INSCRIPTION</a> --}}
            <a href="#" class="btn btn-primary text-white">INSCRIPTION</a>
        </div>
    </div>
    <div class="d-flex row mt-4 mb-2 ms-5 me-5">
        <div class="col-md-6">
            <p>Date: {{ $race->date }}</p>
            <p>Start: {{ $race->start }}</p>
            <p>Distance: {{ $race->distance }}</p>
            <p>Unevennes: {{ $race->unevennes }}</p>
            <p>Inscription's price: {{ $race->inscription }}</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/' . $race->map) }}" alt="Race Map" style="max-width: 500px;">
        </div>
    </div>
    <h1 class="text-center">CHALLENGES</h1>
</div>

{{-- vale vamos a volver al codigo de antes, en el que se pasaba un objeto race a una vista.
la web del proyecto gestiona carreras parecidas a las spartan races, por lo tanto las carreras estan compuestas por "challenges" o desafios, por lo tanto en mi base de datos tengo entre otras 3 tablas que nos interesan races(la tabla con las carreras), challenges(la tabla con los desafios de cada carrera) y una tabla que relaciona estas dos anteriores llamadas race_challenges --}}
