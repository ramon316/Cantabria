@extends('adminlte::page')

@section('title', 'Bases florales')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('eventos.show',['evento'=>$evento->id])}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Bases florales del evento</h1>
      </div>
    </div>
</div>
<div class="container">
    @livewire('add-evento-floralbase', ['evento' => $evento])
    @livewire('comments-index', ['evento' => $evento])
</div>
@stop

@section('content')

@stop

@section('css')
@stop
@section('js')

@stop
