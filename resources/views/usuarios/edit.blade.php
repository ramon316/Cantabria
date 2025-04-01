<!--Plantilla AdminLTE-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="container">
    <div class="row align-items-center">
        <div class="col-4 text-start">
            <a class="btn btn-info" href="{{ route('usuarios.index')}}" role="button">Regresar</a>
        </div>
        <div class="col-4 text-center">
            <h1>Modificar Usuario</h1>
        </div>
    </div>
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
        <form method="POST" action="{{ route('usuarios.update',$usuario)}}" novalidate>
        @csrf
        @method('put')
            <div class="form-group">
                <label for="name">Nombre del usuario:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder=""
                value="{{old('name',$usuario->name)}}"
                >
                @error('name')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
                <small id="helpNombre" class="form-text text-muted">Ingresa por favo rel nombre del Usuario, debe ser único.</small>
            </div>

            <div class="form-group">
                <label for="email">Correo del usuario:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder=""
                value="{{old('email',$usuario->email)}}"
                >
                @error('email')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
                <small id="helpNombre" class="form-text text-muted">Ingresa el correo del usuario.</small>
            </div>

            <div class="form-group">
                <label for="roles">Rol del usuario:</label>
                <select name="role" class="form-control">
                    @foreach ($allRolesInDatabase as $role)
                        <option value="{{ $role }}"
                            {{ $usuario->hasRole($role) ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="color">Color del usuario:</label>
                <input type="color" class="form-control @error('color') is-invalid @enderror" name="color" id="color" placeholder=""
                value="{{old('color',$usuario->color)}}"
                >
                @error('email')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                @enderror
                <small id="helpNombre" class="form-text text-muted">Ingresa el color del usuario.</small>
            </div>

            <input type="submit" class="btn btn-primary" alig value="Actualizar">

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


