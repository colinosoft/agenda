<div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">

                <div class="mb-3">
                    <label for="cita" class="form-label fs-2 fw-bold">Selecciones el tratamiento</label>
                    <select class="form-select" wire:model="selectedClass" name="servicio" id="servicio">

                        @foreach ($tratamiento as $tratamient)
                            <option value="{{$tratamient->duracion}}">{{ $tratamient->nombreTratamiento }}</option>

                        @endforeach

                    </select>
                </div>
                {{$selectedClass}}
                <div>
                    <h1 wire:model="citaConsulta">{{$citaConsulta}}</h1>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" id="confirmar" wire:click="$toggle('showDiv')"
                        class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>

        @if ($showDiv)
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-4">
                    <ul class="list-group">
                        {{-- @foreach ($citas as $cita) --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center btn-success">
                             11:00
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center btn-success">
                               11:30
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center btn-success">
                                12:00
                            </li>
                        {{-- @endforeach --}}

                    </ul>
                </div>
            </div>
        @endif

    </div>
</div>
