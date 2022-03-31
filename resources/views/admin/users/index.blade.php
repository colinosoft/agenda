
@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
   <h1>Lista de usuarios</h1>
@stop

@section('content')

    @livewire('admin.users-index')

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
   <!-- <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet"> -->
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script> console.log('Hi!'); </script>
@stop


