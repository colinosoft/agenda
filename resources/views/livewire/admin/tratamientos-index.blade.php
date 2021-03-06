<div>
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="input-group">
                        <input wire:model="search" class="col-xl-6 form-control " type="text" placeholder="Buscar tratamientos">
                        <button onclick='Livewire.emit("openModal", "admin.edit-tratamientos")' class="offset-xl-2 col-xl-4 mx-1 btn btn-primary fa-solid fa-pen-to-square" >Crear tratamiento</button>
                    </div>
                </div>
            </div>
        </div>
        @if ($tratamientos->count())
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del tratamiento</th>
                            <th>Duración</th>
                            <th>Cabina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tratamientos as $tratamiento)
                            <tr>
                                <td>{{ $tratamiento->id }}</td>
                                <td>{{ $tratamiento->nombreTratamiento }}</td>
                                <td>{{ $tratamiento->duracion }}</td>
                                <td>{{ $tratamiento->cabina }}</td>
                                <td class="grid grid-cols-2">
                                    {{-- <button  wire:click="$emit('admin.edit-user')">Hola</button>--}}

                                     {{-- , ['user' => $user], key($user->id) --}}
                                     {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="$emit('postAdded',{{$user->id}})" data-bs-target="#exampleModal">
                                        Editar fuera
                                      </button> --}}


                                      {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="usuario({{$user->id}})" data-bs-target="#exampleModal">
                                        Editar
                                      </button> --}}
                                      {{-- @livewire('admin.edit-user' ,['user' => $user,'title' => 'Editar usuario'], key($user->id)) --}}

                                    <button class="mx-1 btn btn-primary fa-solid fa-pen-to-square" onclick='Livewire.emit("openModal", "admin.edit-tratamientos", @json([$tratamiento]))'></button>
                                    {{-- Boton borrar normal
                                    <button class="mx-1 btn btn-danger fas fa-trash" wire:click="delete({{$user->id}})"></button> --}}
                                    <button class="mx-1 btn btn-danger fas fa-trash" wire:click="$emit('deleteTratamiento',{{$tratamiento->id}})"></button>

                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer">
                {{ $tratamientos->links() }}
            </div>
        @else
            <div class="card-body">
                <strong> No se han encontrado coincidencias </strong>
            </div>
        @endif

    </div>
</div>
