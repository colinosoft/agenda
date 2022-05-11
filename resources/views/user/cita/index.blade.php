@extends('layouts.app')
@section('content')
    @livewire('user.pedir-cita')
    <script src="{{ asset('js/pedircita.js') }}" defer></script>
@endsection
