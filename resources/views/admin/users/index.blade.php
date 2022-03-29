
@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
   <h1>Lista de usuarios</h1>
@stop

@section('content')
  @livewire('admin.users-index')

@stop

@section('css')

   <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
   <!-- <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet"> -->
@stop

@section('js')

   <script> console.log('Hi!'); </script>
@stop


