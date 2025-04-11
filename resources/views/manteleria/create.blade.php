@extends('adminlte::page')

@section('title', 'Manteleria')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('eventos.show',['evento'=>$evento->id])}}">Regresar</a>
      </div>
      <div class="col-md-9">
        <h1 class="text-center">Guardar Mantelería del evento</h1>
      </div>
      <div class="col-md-2">
        <a href="" class="btn btn-info">Imprimir Mantelería</a>
      </div>
    </div>
</div>
@stop

@section('content')
    @livewire('add-tablecloth',['evento'=>$evento])
    @livewire('add-lights',['evento'=>$evento])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop
