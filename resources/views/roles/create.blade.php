@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1 class="text-center">Crear un nuevo Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'roles.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' =>    'form-control', 'placeholder' => 'Ingresa el nombre del rol']) !!}
            </div>
            <h2 class="h3">Lista de permisos</h2>

            @foreach ($permissions as $permission)
                <div>
                    <label for="">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
@stop