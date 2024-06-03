@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('inventory.tablecloth')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Modificar mantelería</h1>
      </div>
    </div>
</div>
@stop

@section('content')
    <div class="container">
    <form action="{{route('inventory.tableclothupdate',['tablecloth'=>$tablecloth])}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
         <div class="col-md-4">
             <label for="">Nombre del mantel</label>
             <input type="text"
             name="name"
             class="form-control"
             value="{{$tablecloth->name}}"
             >
             @error('name')
                <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
            @enderror
         </div>
         <div class="col-md-4">
             <label for="">Tonalidad del mantel</label>
             <input type="text"
             name="tonality"
             class="form-control"
             value="{{$tablecloth->tonality}}">
         </div>
         <div class="col-md-4">
             <label for="">Tipo de mesa</label>
             <select class="form-control" name="tabletype">
                 <option value="">--Selecciona un tipo de mesa--</option>
                 <option value="Cuadrada" 
                 {{$tablecloth->tabletype =='Cuadrada' ? 'selected' : ''}}>
                 Cuadrada</option>
                 <option value="Imperial" 
                 {{$tablecloth->tabletype =='Imperial' ? 'selected' : ''}}>
                Imperial</option>
                 <option value="Redonda" 
                 {{$tablecloth->tabletype =='Redonda' ? 'selected' : ''}}>
                    Redonda</option>
             </select>
         </div>
        </div>
        <div class="row">
             <div class="col-md-4">
                 <label for="">Estado de los manteles</label>
                 <select class="form-control" name="status">
                     <option value="">--Selecciona una opción</option>
                     <option value="Bueno"
                     {{$tablecloth->status=='Bueno' ? 'selected' : ''}}>
                     Bueno</option>
                     <option value="Regular"
                     {{$tablecloth->status=='Regular' ? 'selected' : ''}}>
                     Regular</option>
                     <option value="Malo" 
                     {{$tablecloth->status=='Malo' ? 'selected' : ''}}>
                        Malo</option>
                 </select>
             </div>
             <div class="col-md-3">
                 <label for="">Cantidad de manteles</label>
                 <input type="number"
                 class="form-control"
                 name="amount"
                 value="{{$tablecloth->amount}}">
                 <small class="form-text text-muted">Ingresa la cantidad de manteles</small>
             </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if ($tablecloth->imagen <> null)
                <label for="">Imagen actual</label>
                <img class="img-fluid" src="{{ asset('inventories/tablecloths') . '/' . $tablecloth->image }}" style="width: 300px" alt="">
                @endif
            </div>
        </div>
        <div class="row">
             <div class="col-md-4">
                 <label for="">Selecciona la imagen del mantel</label>
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