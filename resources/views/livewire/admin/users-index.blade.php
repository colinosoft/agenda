<div>
    @livewire('admin.edit-user')
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Buscar usuarios">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-stripe">
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
                                <td width="10px">
                                    {{-- <button  wire:click="$emit('admin.edit-user')">Hola</button>--}}

                                     {{-- , ['user' => $user], key($user->id) --}}
                                     {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="$emit('postAdded',{{$user->id}})" data-bs-target="#exampleModal">
                                        Editar fuera
                                      </button> --}}
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"  wire:click="usuario({{$user->id}})" data-bs-target="#exampleModal">
                                        Editar fuera
                                      </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
