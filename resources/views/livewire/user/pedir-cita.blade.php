<div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="cita" class="form-label fs-2 fw-bold">Selecciones el tratamiento</label>
                    <select class="form-select" wire:model="selectedClass" name="servicio" id="servicio">

                        @foreach ($tratamiento as $tratamient)
                            <option   wire:click="$emit('nombre', '{{ $tratamient->nombreTratamiento }}') "
                                 value="{{$tratamient->duracion}},{{$tratamient->id}},{{$tratamient->nombreTratamiento}}" >{{ $tratamient->nombreTratamiento }}

                            </option>
                        @endforeach

                    </select>
                </div>
                {{-- {{$selectedClass}} --}}
                <div>
                    {{-- <h1 wire:model="interval">{{$section}}</h1> --}}
                </div>
                {{-- <div class="d-grid gap-2">
                    <button type="submit" id="confirmar" wire:click="$toggle('showDiv')"
                        class="btn btn-primary">Confirmar</button>
                </div> --}}
            </div>
        </div>

        {{-- @if ($showDiv) --}}
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-4">
                {{-- <select class="form-select" wire:model="intervalClass" name="servicio" id="servicio">

                    @foreach ($section as $sec)
                        <option value="{{ $sec }}">{{ $sec }}</option>
                    @endforeach

                </select> --}}


                <div  wire:model="selectedClass" class="list-group" id="servicio" role="servicio">

                    @foreach ($section as $hora)
                        <li wire:click="$emit('horaReserva', '{{ $hora }}') " wire:ignore
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="list">
                            {{ $hora }}
                        </li>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-4">
                <div class="card text-center">
                    <div wire:poll.guardarCita class="card-body">
                        <h5 class="card-title">Ha seleccionado: {{$nombreSeleccion}} </h5>
                        <p class="card-text">Para el dia: {{ $fechaseleccion }}</p>
                        <a wire:click="$emit('guardarCita', '{{ $nombreSeleccion }}') " href="#" class="btn btn-primary">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
