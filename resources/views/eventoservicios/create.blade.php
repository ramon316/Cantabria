@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<div class="container">
    <div class="container-fluid">
        <div class="row m-3 ">
          <div class="col-md-1">
            <a  class="btn btn-secondary" href="{{route('eventos.show',['evento'=>$evento->id])}}">Regresar</a>
          </div>
          <div class="col-md-11">
            <h1 class="text-center">Agregar servicio al evento</h1>
          </div>
        </div>
    </div>
</div>
@stop

@section('content')
    @livewire('add-service', ['evento' => $evento])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
@stop
