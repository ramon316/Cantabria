<!--Plantilla AdminLTE-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="container">
    <h1 class="text-center">Crear Usuario</h1>
</div>
@stop

@section('content')
<div class="app">

    <div class="container">
        <!--Esta es el apartado de los mensajes-->
        @if(session('mensaje'))
        <div class="alert {{session('estilo')}}" role="alert">
        <strong>{{session('mensaje')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        {{-- Fin cel mensaje --}}
        <form method="POST" action="{{ route('usuarios.store')}}" novalidate>
        @csrf
            <div class="form-group">
                <label for="name">Nombre del usuario:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder=""
                value="{{old('name')}}"
                >
                @error('name')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
                <small id="helpNombre" class="form-text text-muted">Ingresa por favo rel nombre del Usuario, debe ser único.</small>
            </div>

            <div class="form-group">
                <label for="email">Correo del usuario:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder=""
                value="{{old('email')}}"
                >
                @error('email')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
                <small id="helpNombre" class="form-text text-muted">Ingresa el correo del usuario.</small>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="">
                @error('password')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password2">Confirmación de la contraseña:</label>
                <input type="password" class="form-control @error('ConfirmacionPassword') is-invalid @enderror" name="ConfirmacionPassword" id="ConfirmacionPassword" placeholder="">
                @error('ConfirmacionPassword')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" alig value="Crear Usuario">

        </form>
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop


