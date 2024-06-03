@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('tableclothbase.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Modificar base de mantel</h1>
      </div>
    </div>
</div>
@stop

@section('content')
    <div class="container">
    <form action="{{route('tableclothbase.update',['tableclothbase'=>$tableclothbase])}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
         <div class="col-md-4">
             <label for="">Color de la base del mantel</label>
             <input type="text"
             name="color"
             class="form-control"
             value="{{$tableclothbase->color}}"
             >
             @error('color')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
         </div>
         <div class="col-md-4">
             <label for="">Tipo de mesa</label>
             <select class="form-control" name="tabletype">
                 <option value="">--Selecciona un tipo de mesa--</option>
                 <option value="Cuadrada" 
                 {{$tableclothbase->tabletype =='Cuadrada' ? 'selected' : ''}}>
                 Cuadrada</option>
                 <option value="Imperial" 
                 {{$tableclothbase->tabletype =='Imperial' ? 'selected' : ''}}>
                Imperial</option>
                 <option value="Redonda" 
                 {{$tableclothbase->tabletype =='Redonda' ? 'selected' : ''}}>
                    Redonda</option>
             </select>
         </div>
         <div class="col-md-4">
             <label for="">Estado de los manteles</label>
             <select class="form-control" name="status">
                 <option value="">--Selecciona una opción</option>
                 <option value="Bueno"
                 {{$tableclothbase->status=='Bueno' ? 'selected' : ''}}>
                 Bueno</option>
                 <option value="Regular"
                 {{$tableclothbase->status=='Regular' ? 'selected' : ''}}>
                 Regular</option>
                 <option value="Malo" 
                 {{$tableclothbase->status=='Malo' ? 'selected' : ''}}>
                    Malo</option>
             </select>
         </div>
        </div>
        <div class="row">
             <div class="col-md-3">
                 <label for="">Cantidad de bases de mantel</label>
                 <input type="number"
                 class="form-control"
                 name="amount"
                 value="{{$tableclothbase->amount}}">
                 <small class="form-text text-muted">Ingresa la cantidad de manteles</small>
             </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if ($tableclothbase->image <> null)
                <label for="">Imagen actual</label>
                <img class="img-fluid" src="{{ asset('inventories/tableclothbases') . '/' . $tableclothbase->image }}" style="width: 300px" alt="">
                @endif
            </div>
        </div>
        <div class="row">
             <div class="col-md-4">
                 <label for="">Selecciona la imagen de la base del mantel</label>
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
@stop

@section('js')
@stop