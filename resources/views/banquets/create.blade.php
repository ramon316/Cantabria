@extends('adminlte::page')

@section('title', 'Detalle banquete')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
        <div class="col-md-1">
            <a class="btn btn-success" href="{{route('eventos.show',['evento'=>$evento->id])}}">Regresar</a>
        </div>
        <div class="col-md-11">
            <h1 class="text-center">Detalle del banquete</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <label for="">Cliente: {{$evento->cliente->nombre}}</label><br>
            <label for="">Evento: {{$evento->title}} - {{$evento->subtitle}}</label><br>
            <label for="">Fecha del evento: {{$evento->start->format('d-m-Y')}}</label><br>
            <label for="">Fecha de degustación:
                @isset($evento->banquet)
                {{$evento->banquet->updated_at->format('d-m-Y')}}
                @endisset
            </label><br>
            <label for="">Cantidad de platillos:{{$cantidad }}
            </label><br>
        </div>

    </div>
    @livewire('banquet-index', ['evento' => $evento])
</div>
@stop

@section('content')

@stop

@section('css')
@stop
@section('js')

@stop
