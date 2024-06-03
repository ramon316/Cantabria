@extends('adminlte::page')

@section('title', 'Otros Servicios')

@section('content_header')
<div class="container">
    <h1 class="text-center">Agregar otros servicios</h1>
</div>
@stop

@section('content')
<div class="container">
  <div class="app">

<form method="POST" action="{{ route('servicio.store') }}" novalidate>    
    @csrf
    <div class="row">

      {{-- col 5 --}}      
      <div class="col-md-5">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" aria-describedby="helpNombre" placeholder=""
          value="{{old('nombre')}}">
          @error('nombre')
                <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
            @enderror
          <small id="helpNombre" class="form-text text-muted">Ingresa el nombre que lo identificará</small>
        </div>
      </div>
      {{-- col 5 --}}

      {{--Col 3  --}}
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Días del servicio</label>
            <select class="form-control @error('dias') is-invalid @enderror" 
                    name="dias" 
                    value="{{old('dias')}}">
              <option value="">--Selecciona los días--</option>
              @foreach($dias as $dia)
                <option value="{{$dia['id']}}">{{$dia['dias']}}</option>
              @endforeach
            </select>
            <small id="helpNombre" class="form-text text-muted">Selecciona los día en el que es efectivo el servicio</small>
        </div>
      </div>
      {{-- Col 3 --}}

      {{-- Col 3 --}}
      <div class="col-md-3">
        <div class="form-group">
          <label for="año">Año:</label>
          <select class="form-control @error('año') is-invalid @enderror" 
                    name="año" 
                    value="{{old('año')}}">
              <option value="">--Selecciona el año--</option>
              @foreach ($años as $año)
                <option value="{{$año}}">{{$año}}</option>
              @endforeach
            </select>
          <small id="helpaño" class="form-text text-muted">Selecciona el año en el que es efectivo el servicio</small>
        </div>
      </div>
      {{-- col 3 --}}
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="costo">Costo en pesos:</label>
          <input type="number" class="form-control @error('costo') is-invalid @enderror" name="costo" id="costo"
          value="{{old('costo')}}">
          @error('costo')
                <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
            @enderror
          <small id="helpNombre" class="form-text text-muted">Ingresa el costo del servicio</small>
        </div>
      </div>

     {{--  <div class="col-md-3">
        <div class="form-group">
          <label for="ganancia">Ganancia en pesos:</label>
          <input type="number" class="form-control @error('ganancia') is-invalid @enderror" name="ganancia" id="ganancia"
          value="{{old('ganancia')}}">
          @error('ganancia')
                <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
            @enderror
          <small id="helpNombre" class="form-text text-muted">Ingresa la ganancia de este servicio</small>
        </div>
      </div> --}}
      <div class="col-md-3">
        <div class="form-group">
          <label for="invitados">Cantidad de invitados:</label>
          <input type="number" class="form-control @error('invitados') is-invalid @enderror" name="invitados" id="invitados"
          value="{{old('invitados')}}">
          @error('invitados')
                <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
            @enderror
          <small id="helpmedida" class="form-text text-muted">Ingresa la cantidad de invitados para el que aplicara esta decoración, si es para todo tipo ingresa un cero</small>
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="hidden" name="servicio" value="otroservicio">
    </div>
    
    <input type="submit" class="btn btn-primary" alig value="Guardar">
    

</form>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop