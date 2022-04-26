@extends('adminlte::page')

@section('title', 'Administrador | Usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')

    @livewire('livewire-ui-modal')
    @livewire('admin.users-index')

@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <!-- <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

@stop

@section('js')

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

                    Livewire.emitTo('admin.users-index', 'delete',userId);

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
