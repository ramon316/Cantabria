@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<div class="container">
  <div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('clientes.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Editar cliente</h1>
      </div>
    </div>
</div>
</div>
@stop

@section('content')

<div class="container">
    <form method="POST" action="{{route('clientes.update', ['cliente'=> $cliente->id])}}" novalidate>    
    @csrf
    @method('PUT')
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nombre">Nombre de cliente:</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" aria-describedby="helpNombre" placeholder=""
            value="{{$cliente->nombre}}">
            @error('nombre')
                  <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
              @enderror
            <small id="helpNombre" class="form-text text-muted">Ingresa por favorel nombre del cliente</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" aria-describedby="helptelefono"
            value="{{$cliente->telefono}}">
            @error('telefono')
              <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            <small id="helptelefono" class="form-text text-muted">Ingresa tu telefono con clave lada, ejemplo, 6141234567</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpEmail" placeholder="coreo@dominio.com"
            value="{{$cliente->email}}">
            @error('email')
              <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
            <small id="helpEmail" class="form-text text-muted">Ingresa un correo electrónico valido</small>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="calle">Calle</label>
            <input type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" id="calle" aria-describedby="helpCalle"
            value="{{$cliente->calle}}">
            @error('calle')
            <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
            <small id="helpCalle" class="form-text text-muted">Ingresa el nombre de tu calle</small>
          </div>        
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" id="numero" aria-describedby="helpNumero" placeholder=""
            value="{{$cliente->numero}}">
            @error('numero')
              <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            
            <small id="helpNumero" class="form-text text-muted">Ingresa el numero exterior de tu domicilio</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="colonia">Colonia</label>
            <input type="text" class="form-control @error('colonia') is-invalid @enderror" name="colonia" id="colonia" aria-describedby="helpColonia" placeholder=""
            value="{{$cliente->colonia}}">
            @error('colonia')
              <div class="invalid-feedback" role="alert">{{$message}}</div>        
            @enderror
            <small id="helpColonia" class="form-text text-muted">Ingresa el nombre de tu colonia</small>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="cp">Código Postal</label>
            <input type="text" class="form-control @error('cp') is-invalid @enderror" name="cp" id="cp" aria-describedby="helpCp" placeholder=""
            value="{{$cliente->cp}}">
            @error('cp')
              <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            <small id="helpCp" class="form-text text-muted">Ingresa tu código postal</small>
          </div>
        </div>
      </div>
    
    <input type="submit" class="btn btn-primary" alig value="Guardar">
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
