
@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
   <h1>Bienvenido</h1>
@stop

@section('content')

   @livewire('livewire-ui-modal')
   @livewire('admin.tratamientos-index')

@stop

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

@stop

@section('js')
   <script> console.log('Hi!'); </script>

    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        Livewire.on('deleteTratamiento', tratamientoId => {

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

                    Livewire.emitTo('admin.tratamientos-index', 'delete',tratamientoId);

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


