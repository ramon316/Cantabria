@extends('adminlte::page')

@section('title', 'Otros Servicios')

@section('content_header')
<div class="container">
    <a class="btn btn-info" href="{{route('servicios.index')}}" role="button">Regresar</a>
    <h1 class="text-center">Editar servicios</h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="app">

        <form method="POST" action="{{ route('servicios.update', ['servicio'=> $servicio->id])}}" novalidate>
            @csrf
            @method('PUT')
            <div class="row">

                {{-- col 5 --}}
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                            id="nombre" aria-describedby="helpNombre" placeholder="" value="{{$servicio->nombre}}">
                        @error('nombre')
                        <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                        @enderror
                        <small id="helpNombre" class="form-text text-muted">Ingresa el nombre que lo
                            identificará</small>
                    </div>
                </div>


                {{-- Col 3 --}}
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="año">Año:</label>
                        <select class="form-control @error('año') is-invalid @enderror" name="año"
                            value="{{old('año')}}">
                            <option value="">--Selecciona el año--</option>
                            @foreach ($años as $año)
                            <option value="{{$año}}" {{old('año', $servicio->año ?? "") == $año ? 'selected': ''}}>{{$año}}</option>
                            @endforeach
                        </select>
                        <small id="helpaño" class="form-text text-muted">Selecciona el año en el que es efectivo el
                            servicio</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="costo">Costo en pesos:</label>
                        <input type="number" class="form-control @error('costo') is-invalid @enderror" name="costo"
                            id="costo" value="{{$servicio->costo}}" disabled>
                        @error('costo')
                        <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                        @enderror
                        <small id="helpNombre" class="form-text text-muted">Ingresa el costo del servicio</small>
                    </div>
                </div>
                {{-- col 3 --}}
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="category">Categoria del servicio:</label>
                        <select class="form-control @error('category') is-invalid @enderror" name="category"
                            value="{{old('category')}}">
                            <option value="">--Selecciona una categoría--</option>
                            <option value="alimentos" {{old('category',$servicio->categoria ?? "")== 'alimentos' ? 'selected' : ''}}>Alimentos</option>
                            <option value="animacion" {{old('category',$servicio->categoria ?? "")== 'animacion' ? 'selected' : ''}}>Animación</option>
                            <option value="decoracion" {{old('category',$servicio->categoria ?? "")== 'decoracion' ? 'selected' : ''}}>Renta y Decoracion</option>
                            <option value="otro" {{old('category',$servicio->categoria ?? "")== 'otros' ? 'selected' : ''}}>Otro</option>
                        </select>
                        <small id="helpaño" class="form-text text-muted">Selecciona el año en el que es efectivo el
                            servicio</small>
                    </div>
                </div>
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
