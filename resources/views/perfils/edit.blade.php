@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1 class="text-center">Editar perfil</h1>
@stop

@section('content')
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
    <form method="POST" action="{{ route('perfils.update',['perfil' => $perfil->id])}}" enctype="multipart/form-data" novalidate>
    @csrf
    @method('put')

        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') in-invalid @enderror" placeholder="" aria-describedby="helpId"
          value="{{Auth::user()->name}}">
          @error('nombre')
              <div class="invalid-feedback" role="alert">{{$message}}</div>
          @enderror
          <small id="helpId" class="text-muted">Ingresa tu nombre</small>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" aria-describedby="helptelefono"
            value="{{$perfil->telefono}}">
            @error('telefono')
                <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            <small id="helptelefono" class="form-text text-muted">Ingresa tu telefono con clave lada, ejemplo, 6141234567</small>
        </div>

       <!--Agregar una imagen-->
            <div class="form-group">
                <label for="imagen">Elige una imagen</label>
                <input type="file"
                class="form-control @error('imagen') is-invalid @enderror"
                name="imagen"
                id="imagen"
                value="{{old('imagen')}}"
                >
                <small id="helpId" class="form-text text-muted">Selecciona la imagen que se usará para tu perfil</small>
                <!--Como estamos editando la imagen es necesario que la mostremos antes para poder saber si la cambiaremos-->
                <div class="mt-4">
                    <p>Imagen actual:</p>
                    @if(Auth::user()?->perfil->imagen)
                        {{-- <img src="{{ asset('upload-perfiles') . '/' . Auth::user()->perfil->imagen}}" style="width: 300px"> --}}

                        <img src="{{ asset($perfil->url_imagen)}}" alt="" width="300">
                    @else
                        <img src="{{ asset('upload-perfiles') . '/' . 'default.png'}}" style="width: 300px">
                    @endif
                </div>
                @error('imagen')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                @enderror
            </div>

        <input type="submit" class="btn btn-primary" alig value="Guardar">

    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
@stop
