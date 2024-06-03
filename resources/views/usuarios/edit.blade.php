<!--Plantilla AdminLTE-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="container">
    <h1 class="text-center">Modificar Usuario</h1>
</div>
@stop

@section('content')
@if(session('mensaje'))
<div class="alert {{session('estilo')}} alert-dismissible fade show" role="alert">
    <strong>{{session('mensaje')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{ $usuario->name }}</p>
        {{-- Laravel Collective --}}
        <p class="h5">Listado de Roles</p>
        {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>   
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1' ]) !!} 
                        {{ $role->name}}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop


