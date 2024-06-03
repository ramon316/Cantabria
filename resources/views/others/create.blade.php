@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
        <div class="col-md-1">
            <a class="btn btn-success" href="{{route('others.index')}}">Regresar</a>
        </div>
        <div class="col-md-11">
            <h1 class="text-center">Agregar nuevo inventario</h1>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container">
    <form action="{{route('others.store')}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-4">
                <label for="">Color o tipo</label>
                <input type="text" name="color" class="form-control" value="{{old('color')}}">
                @error('color')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">Tipo de inventario</label>
                <select class="form-control" name="type">
                    <option value="">--Selecciona el tipo de inventario--</option>
                    <option value="Copas" {{old('type')=='Copas' ? 'selected' : '' }}>
                        Copas
                    </option>
                    <option value="Platos" {{old('type')=='Platos' ? 'selected' : '' }}>
                        Platos
                    </option>
                    <option value="Servilletas" {{old('type')=='Servilletas' ? 'selected' : '' }}>
                        Servilletas
                    </option>
                    <option value="Vasos" {{old('type')=='Vasos' ? 'selected' : '' }}>
                        Vasos
                    </option>
                </select>
                @error('type')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="">Cantidad en inventario</label>
                <input type="number" class="form-control" name="quantity" value="{{old('quantity')}}">
                @error('quantity')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <input type="submit" class="btn btn-primary mt-3" value="Guardar">
            </div>
        </div>
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
