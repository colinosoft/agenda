<div>
    {{-- @livewire('admin.edit-user',['title' => 'Editar usuario']) --}}
    {{-- @livewire('livewire-ui-modal') --}}
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Buscar usuarios">
        </div>
        @if ($users->count())
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="grid grid-cols-2 min-w-min">
                                    {{-- <button  wire:click="$emit('admin.edit-user')">Hola</button>--}}

                                     {{-- , ['user' => $user], key($user->id) --}}
                                     {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="$emit('postAdded',{{$user->id}})" data-bs-target="#exampleModal">
                                        Editar fuera
                                      </button> --}}


                                      {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="usuario({{$user->id}})" data-bs-target="#exampleModal">
                                        Editar
                                      </button> --}}
                                      {{-- @livewire('admin.edit-user' ,['user' => $user,'title' => 'Editar usuario'], key($user->id)) --}}

                                    <button class="mx-1 btn btn-primary fa-solid fa-pen-to-square" onclick='Livewire.emit("openModal", "admin.edit-user", @json([$user]))'></button>
                                    {{-- Boton borrar normal
                                    <button class="mx-1 btn btn-danger fas fa-trash" wire:click="delete({{$user->id}})"></button> --}}
                                    <button class="mx-1 btn btn-danger fas fa-trash" wire:click="$emit('deleteUser',{{$user->id}})"></button>

                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong> No se han encontrado coincidencias </strong>
            </div>
        @endif

    </div>
</div>
