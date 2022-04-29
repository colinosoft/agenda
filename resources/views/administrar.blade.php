
@extends('adminlte::page')

 @section('title', 'Administrador')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Panel de administrador</p>
    @livewire('livewire-ui-modal')

@stop

@section('css')


@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop


