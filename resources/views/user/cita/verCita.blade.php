@extends('layouts.app')
@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('user.ver-cita')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('guardarCita', nombreSeleccion => {

            Swal.fire({
                position: 'middle',
                icon: 'success',
                title: 'Su cita de '+ nombreSeleccion +' ha sido confirmada',
                showConfirmButton: false,
                timer: 5000
            })
        })
    </script>
@endsection
