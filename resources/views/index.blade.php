@extends('layouts.app')

@section('content')
<!-- <div class="container-fluid  w-100 h-50">

        <img style="width:100%; height:400px;" id="image"src="img/utensiliosCabecera.jpg">

    </div> -->
<div class="container">



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pagina de Inicio') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estas logueado!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
