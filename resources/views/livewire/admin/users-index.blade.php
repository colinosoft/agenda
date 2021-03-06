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
                                <td class="grid grid-cols-2">
                                    <button class="mx-1 btn btn-primary fa-solid fa-pen-to-square" onclick='Livewire.emit("openModal", "admin.edit-user", @json([$user]))'></button>
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
