@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1 class="text-center">Mi perfil</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if(Auth::user()->perfil->imagen)
                <img src="{{ asset('upload-perfiles') . '/' . Auth::user()->perfil->imagen}}">
            @else
                <img src="/upload-perfiles/default.png" class="img-fluid rounded mx-auto d-block" alt="">
            @endif
        </div>
        <div class="col-md-6 bg-white shadow mb-3 text-center">
            <p>
                <span class="font-weight-bold">Nombre: </span>
                {{$usuario->name}}
            </p>
            <p>
                <span class="font-weight-bold">Correo: </span>
                {{$usuario->email}}
            </p>
            <p>
                <span class="font-weight-bold">Rol: </span>
                @role('Administrador')
                Administrador
                @else
                Usuario
                @endrole
            </p>
            <p>
                <span class="font-weight-bold">Teléfono: </span>
                {{$usuario->perfil->telefono}}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a name="" id="" class="btn btn-warning" href="{{  route('perfils.edit', ['perfil'=>Auth::user()->id]) }}" role="button">Editar</a>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop