@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')
    <h1 class="text-center">Cuentas</h1>
@stop

@section('content')
<div id="app">
<div class="container">
    <form method="POST" action="{{ route('cuentas.store')}}" novalidate>
    @csrf
    <div class="row">
        <div class ="col-md-4">
            <div class="form-group">
              <label for="banco">Banco</label>
              <input type="text" name="banco" id="banco" class="form-control 
              @error('banco')
                  is-invalid
              @enderror" placeholder="" aria-describedby="helpId"
              value="{{ old('banco') }}">
              @error('banco')
                <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
              <small id="helpId" class="text-muted">Ingresa el nombre del banco al que pertenece la cuentas</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            <label for="cuenta">Nombre de la Cuenta</label>
            <input type="text" name="cuenta" id="cuenta"
            value="{{old('cuenta')}}" 
            class="form-control 
            @error('cuenta')
                is-invalid
            @enderror" 
            placeholder="" aria-describedby="helpId">
            @error('cuenta')
                <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            <small id="helpId" class="text-muted">Ingresa el nombre de la cuenta con la que lo quieras identificar</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            <label for="clabe">Clabe</label>
            <input type="text" name="clabe" id="clabe"
            value="{{old('clabe')}}"
            class="form-control
            @error('clabe')
                is-invalid
            @enderror" 
            placeholder="" aria-describedby="helpId">
            @error('clabe')
                <div class="invalid-feedback" role="alert">{{$message}}</div>
            @enderror
            <small id="helpId" class="text-muted">Ingresa el numero Clabe de la cuenta</small>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="form-group">
              <label for="moneda">Moneda</label>
              <select class="form-control" name="moneda" id="moneda">
                <option value="pesos">Pesos</option>
                <option value="dolares">Dolares</option>
              </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
              <input type="submit"
                class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </form>
<div>


<div class="mx-auto bg-white p-3">  
<table class="table">
    <thead class="bg-primary text-light text-center">
        <tr>
            <th>Banco</th>
            <th>Cuentas</th>
            <th>Clabe</th>
            <th>Moneda</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentas as $cuenta )
        <tr class="text-center">
            <td>{{$cuenta->banco}}</td>
            <td>{{$cuenta->cuenta}}</td>
            <td>{{$cuenta->clabe}}</td>
            <td>{{$cuenta->moneda}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop
