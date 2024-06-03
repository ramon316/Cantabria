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
            <label for="">Fecha del evento: {{$evento->start->format('d-m-Y')}}</label><br>
            <label for="">Fecha de degustación:
                @isset($evento->banquet)
                {{$evento->banquet->updated_at->format('d-m-Y')}}
                @endisset
            </label><br>
            <label for="">Cantidad de platillos:
                @foreach ($evento->servicio as $item)
                {{$item->pivot->cantidad}}
                @endforeach
            </label><br>
        </div>

        @if ($evento->banquet()->count()>0)
        <div class="card">
            <div class="card-header">
                <div class="card-title">Banquete</div>
                <div class="card-tools">
                    <a href="" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
            <div class="card-body">
                Entrada:{{$banquet->entry}}
                Corte: {{$banquet->steak}}
                Salsa: {{$banquet->sauce}}
            </div>
        </div>
        @endif
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
