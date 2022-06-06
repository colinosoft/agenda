<div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="cita" class="form-label fs-2 fw-bold">Seleccione el tratamiento</label>
                    <select class="form-select" wire:model="selectedClass" name="servicio" id="servicio">
                        @foreach ($tratamiento as $tratamient)
                            <option wire:click="$emit('nombre', '{{ $tratamient->nombreTratamiento }}' ,'{{$tratamient->id}}') "
                                value="{{ $tratamient->duracion }},{{ $tratamient->id }},{{ $tratamient->nombreTratamiento }}">
                                {{ $tratamient->nombreTratamiento }}

                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center mt-5">
            <div class="col-md-4">
                <div wire:model.defer="selectedClass" class="list-group" id="servicio" role="servicio">
                    @foreach ($section as $hora)
                        <li wire:click="$emit('horaReserva', '{{ $hora }}') "
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                            data-bs-toggle="list">
                            {{ $hora }}
                        </li>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center mt-5">
            <div class="col-md-4">
                @if (!empty($fechaseleccion))
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Ha seleccionado: {{ $nombreSeleccion }} </h5>
                            <p class="card-text">Para el dia: {{ $fechaseleccion }}</p>
                            <a wire:click="$emit('guardarCita', '{{ $nombreSeleccion }}','{{$idTratamiento}}') " href="#"
                                class="btn btn-primary">Confirmar</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
