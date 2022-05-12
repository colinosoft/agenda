@extends('layouts.app')
@section('content')
@livewireStyles
    @livewireScripts
    @livewire('user.pedir-cita')

    {{-- <script src="{{ asset('js/pedircita.js') }}" defer></script> --}}
@endsection

