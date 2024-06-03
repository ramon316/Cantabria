@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('cotizacion.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Cotización de {{$cotizacion->cliente->nombre}}</h1>
      </div>
    </div>
</div>
@stop

@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5 bg-white shadow p-4 mb-5 rounded">
                <h4>Información del cliente</h4>
                <p><strong>Cliente: </strong>{{$cotizacion->cliente->nombre}}</p>
                <p><strong>Teléfino: </strong>{{$cotizacion->cliente->telefono}}</p>
                <p><strong>Email: </strong>{{$cotizacion->cliente->email}}</p>
                <p><strong>Dirección: </strong>C. {{$cotizacion->cliente->calle}} #{{$cotizacion->cliente->numero}} Col.{{$cotizacion->cliente->colonia}} C.P. {{$cotizacion->cliente->cp}}</p>
            </div>
            <div class="col-md-5 bg-white shadow p-3 mb-5  rounded">
                <h4>Información del cotizacion</h4>
                <p><strong>Tipo: </strong>{{$cotizacion->title}}</p>
                <p><strong>Horas: </strong>{{$cotizacion->horas}} horas</p>
                <p><strong>Fecha: </strong>{{$cotizacion->start->format('d-m-Y')}}</p>
                <p><strong>Invitados: </strong>{{$cotizacion->invitados}}</p>
                <p><strong>Precio: </strong>$@dinero($costoCotizacion) pesos</p>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-5 bg-white shadow p-4 mb-5 rounded">
                <h4 class="text-center">Acciones</h4>
                <a class="btn btn-info d-block w-100 inline mb-2" href="{{ route('cotizacionservicio.create',['cotizacion'=>$cotizacion->id]) }}" role="button">Agregar o Eliminar Servicio</a>
                <a class="btn btn-info d-block w-100 inline mb-2" href="{{ route('cotizacion.cotizacion',['cotizacion'=>$cotizacion->id]) }}" role="button">Visualizar cotización</a>
            </div>
            @if(count($cotizacion->servicio)>0)
            <div class="col-md-5 bg-white shadow p-3 mb-5 rounded text-center">
            {{-- Realicamos el listado de los servicios --}}
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($servicios as $servicio)
                    <tr>
                        <td scope="row">{{$servicio->nombre}}</td>
                        <td>{{$servicio->pivot->cantidad}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @endif
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop
