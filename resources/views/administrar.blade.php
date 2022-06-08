
@extends('adminlte::page')

 @section('title', 'Administrador')

@section('content_header')

@stop

@section('content')

    @livewire('livewire-ui-modal')
    <div class="container  pt-5">
        <div class="row">
            <div class="card" style="width: 25rem;">

                <div class="card-body">
                  <h1 class="card-title fs-2">Bienvenido al panel de administrador</h1>
                  <p class="card-text pt-3">Desde aquí podra configurar todas las opciones de su aplicación</p>

                </div>
                <img src="{{asset('assets/img/bg-masthead.jpg')}}" class="card-img-top" alt="...">
              </div>

        </div>
    </div>


@stop

@section('css')


@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop


