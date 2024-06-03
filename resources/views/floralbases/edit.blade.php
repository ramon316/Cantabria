@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('floralbase.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Editar base floral</h1>
      </div>
    </div>
</div>
@stop

@section('content')
    <div class="container">
    <form action="{{route('floralbase.update', ['floralbase' => $floralbase])}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
         <div class="col-md-4">
             <label for="">Nombre de la base floral</label>
             <input type="text"
             name="name"
             class="form-control"
             value="{{$floralbase->name}}"
             >
             @error('name')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
         </div>
         <div class="col-md-4">
             <label for="">Categoría</label>
             <select class="form-control" name="category">
                 <option value="">--Selecciona una categoría--</option>
                 <option value="Blanca" 
                 {{$floralbase->category=='Blanca' ? 'selected' : ''}}>
                 Blanca</option>
                 <option value="Dorado" 
                 {{$floralbase->category=='Dorado' ? 'selected' : ''}}>
                Dorado</option>
                 <option value="Negra" 
                 {{$floralbase->category=='Negra' ? 'selected' : ''}}>
                    Negra</option>
                <option value="Plateada" 
                {{$floralbase->category=='Plateada' ? 'selected' : ''}}>
                    Plateada</option>
             </select>
         </div>
         <div class="col-md-3">
            <label for="">Cantidad de bases</label>
            <input type="number"
            class="form-control"
            name="amount"
            value="{{$floralbase->amount}}">
            <small class="form-text text-muted">Ingresa la cantidad de manteles</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if ($floralbase->image <> null)
                <label for="">Imagen actual</label>
                <img class="img-fluid" src="{{ asset('inventories/floralbases') . '/' . $floralbase->image }}" style="width: 300px" alt="">
                @endif
            </div>
        </div>
        <div class="row">
             <div class="col-md-4">
                 <label for="">Selecciona la imagen de la base</label>
                 <input type="file" type="hidden" value="" name="image" id="">
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