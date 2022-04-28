@extends('adminlte::page')

@section('title', 'Administrador | Agenda')

@section('content_header')
    <h1>Agenda</h1>
@stop

@section('content')


    <div class="container">


        <!-- Modal -->
        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Su reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="post" id="formularioCita">

                            {!! csrf_field() !!}

                            <div class="mb-3 d-none">
                                <label for="id" class="form-label ">ID</label>
                                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId"
                                    placeholder="">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="mb-3 d-none">
                                <label for="Titulo" class="form-label"></label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                    placeholder="">
                                <small id="helpId" class="form-text text-muted"></small>
                            </div>

                            <div class="mb-3">
                                <label for="servicio" class="form-label"></label>
                                <select class="form-control" name="servicio" id="servicio">
                                    <!-- <option>Depilación</option>
                                <option>Uñas</option>
                                <option>Laser</option>
                                <option>Rayos</option>
                                <option>Limpieza</option> -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="start" class="form-label">Incio</label>
                                <input type="datetime-local" class="form-control" name="start" id="start"
                                    aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Fecha y hora de incio</small>
                            </div>

                            <div class="mb-3">
                                <label for="end" class="form-label">Fin</label>
                                <input type="datetime-local" class="form-control" name="end" id="end"
                                    aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Fecha y hora de fin</small>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
                        <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
                        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="agenda">
        </div>

    </div>

@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <!-- <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
@stop

@section('js')

    <!-- URL Global del proyecto -->
    <script type="text/javascript">
        var baseURL = {!! json_encode(url('/')) !!}
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/locales-all.js') }}" defer></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{ asset('js/agenda.js') }}" defer></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteUser', userId => {

            Swal.fire({
                title: '¿Seguro que desea eliminar a este usuario?',
                text: "No podras desacer este cambio una vez realizado",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancelar",
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.users-index', 'delete', userId);

                    Swal.fire(
                        'Eliminado!',
                        'Este usuario ha sido eliminado',
                        'success'
                    )
                }
            })
        })
    </script>

@stop
