<div>
    <div class="container pt-5">
        <div class="row">
            <div class="card">
                 <div class="card-header">
                    <h2>Aquí encontrara un resumen de sus citas</h2>
                </div>
                @if ($citas->count())
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre tratamiento</th>
                                    <th>Fecha</th>
                                    <th>Duración</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $cita->title }}</td>
                                        <td>{{ $cita->start }}</td>
                                        <td>{{ $cita->duracion }}</td>
                                        <td class="grid grid-cols-2">
                                            {{-- <button class="mx-1 btn btn-primary fa-solid fa-pen-to-square" onclick='Livewire.emit("openModal", "admin.edit-user", @json([$user]))'></button>
                                            <button class="mx-1 btn btn-danger fas fa-trash" wire:click="$emit('deleteUser',{{$user->id}})"></button> --}}

                                        </td>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $citas->links() }} --}}
                    </div>
                @else
                    <div class="card-body">
                        <strong> No tiene ninguna cita </strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
