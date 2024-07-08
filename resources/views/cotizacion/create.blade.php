@extends('adminlte::page')

@section('title', 'Cotización')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('cotizacion.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Genera tu cotización</h1>
      </div>
    </div>
</div>
@stop

@section('content')
<div class="container">
    @livewire('create-quoter')
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
