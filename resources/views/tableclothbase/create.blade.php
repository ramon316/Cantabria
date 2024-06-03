@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('tableclothbase.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Crear una nueva base de mantel</h1>
      </div>
    </div>
</div>
@stop

@section('content')
    <div class="container">
    <form action="{{route('tableclothbase.store')}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('POST')
        <div class="row">
         <div class="col-md-4">
             <label for="">Color de la base</label>
             <input type="text"
             name="color"
             class="form-control"
             value="{{old('color')}}"
             >
             @error('name')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
         </div>
         <div class="col-md-4">
             <label for="">Tipo de mesa</label>
             <select class="form-control" name="tabletype">
                 <option value="">--Selecciona un tipo de mesa--</option>
                 <option value="Cuadrada" 
                 {{old('status')=='Cuuadrada' ? 'selected' : ''}}>
                 Cuadrada</option>
                 <option value="Imperial" 
                 {{old('status')=='Imperial' ? 'selected' : ''}}>
                Imperial</option>
                 <option value="Redonda" 
                 {{old('status')=='Bueno' ? 'selected' : ''}}>
                    Redonda</option>
             </select>
         </div>
         <div class="col-md-4">
             <label for="">Estado de los manteles</label>
             <select class="form-control" name="status">
                 <option value="">--Selecciona una opción</option>
                 <option value="Bueno"
                 {{old('status')=='Bueno' ? 'selected' : ''}}>
                 Bueno</option>
                 <option value="Regular"
                 {{old('status')=='Regular' ? 'selected' : ''}}>
                 Regular</option>
                 <option value="Malo" 
                 {{old('status')=='Malo' ? 'selected' : ''}}>
                    Malo</option>
             </select>
         </div>
        </div>
        <div class="row">
             <div class="col-md-3">
                 <label for="">Cantidad de manteles</label>
                 <input type="number"
                 class="form-control"
                 name="amount"
                 value="{{old('amount')}}">
                 <small class="form-text text-muted">Ingresa la cantidad de manteles</small>
             </div>
        </div>
        <div class="row">
             <div class="col-md-4">
                 <label for="">Selecciona la imagen de la base de mantel</label>
                 <input type="file" type="hidden" value="{{old('image')}}" name="image" id="">
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