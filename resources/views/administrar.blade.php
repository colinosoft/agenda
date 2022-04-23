
@extends('adminlte::page')

 @section('title', 'Administrador')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p>Panel de administrador</p>
    @livewire('livewire-ui-modal')
        <!-- Outside of any Livewire component -->
<button onclick="Livewire.emit('openModal', 'edit-user')">Edit User</button>

<!-- Inside existing Livewire component -->
<button wire:click="$emit('openModal', 'edit-user')">Edit User</button>

<!-- Taking namespace into account for component Admin/Actions/EditUser -->
<button wire:click="$emit('openModal', 'admin.actions.edit-user')">Edit User</button>
@stop

@section('css')
     {{-- <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/base.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/base.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/components.css" >

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!-- Alpine v2 -->

<!-- Alpine v3 -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


@stop


