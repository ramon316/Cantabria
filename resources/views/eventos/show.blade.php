@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="row">
    <div class="col-md-1">
        <a class="btn btn-info" href="{{ route('eventos.index')}}" role="button">Regresar</a>
    </div>
    <div class="col-md-7">
        <h1 class="text-center">Evento de {{$evento->cliente->nombre}}</h1>
    </div>
    <div class="col-md-4">
        @role('Administrador')
            @livewire('status-event', ['evento' => $evento], key($evento->id))
        @endrole
    </div>
</div>
@stop

@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-3 bg-white shadow p-4 mb-5 rounded">
                <h4>Información del cliente</h4>
                <strong>Cliente: </strong>{{$evento->cliente->nombre}}<br>
                <strong>Teléfono: </strong>{{$evento->cliente->telefono}}<br>
                <strong>Email: </strong>{{$evento->cliente->email}}<br>
                <strong>Dirección: </strong>{{$evento->cliente->calle}} #{{$evento->cliente->numero}}<br>
                {{$evento->cliente->colonia}} C.P. {{$evento->cliente->cp}}<br>
                <strong>Festejado(s):</strong>{{$evento->comment}}<br>
            </div>
            @hasanyrole('Administrador|Ventas|Planeacion|Florista')
            <div class="col-md-3 bg-white shadow p-3 mb-5  rounded">
                <h4>Información del evento</h4>
                <strong>Tipo: </strong>{{$evento->title}}<br>
                <strong>Subtipo: </strong>{{$evento->subtitle}}<br>
                <strong>Horas: </strong>{{$evento->time}}<br>
                <strong>Fecha: </strong>{{$evento->start->format('d-m-Y')}}<br>
                <strong>Invitados: </strong>{{$evento->invitados}}<br>
                <strong>Precio evento: </strong>$@dinero($costoEvento) pesos<br>
                @if ($discount<>0)
                <strong>Descuento:</strong>$@dinero($discount) pesos<br>
                <strong>Total a pagar:</strong>$@dinero($total) pesos<br>
                @endif
                @if ($abonoEvento <> 0)
                    <strong>Abonos:</strong> $@dinero($abonoEvento) pesos<br>
                @endif
                @if ($diferenciaEvento <> 0 )
                    <strong>Saldo:</strong> $@dinero($diferenciaEvento) pesos<br>
                @endif
            </div>
            @endhasanyrole

            {{-- Botones de acciones --}}
            <div class="col-md-3 bg-white shadow p-4 mb-5 rounded">
                <h4 class="text-center">Acciones</h4>

                @hasanyrole('Administrador|Planeacion|Florista|Ventas')
                <a href="" class="btn
                @if (empty($evento->layout))
                    btn-danger
                @else
                    btn-info
                @endif
                d-block w-100 inline mb-2" role="button" data-controls-modal="exampleModal" data-toggle="modal"
                    data-target="#exampleModal" data-bs-backdrop="static" data-bs-keyboard="false">Layout
                </a>
                @endhasanyrole

                @hasanyrole('Administrador|Ventas|Planeacion')
                <a class="btn btn-info d-block w-100 inline mb-2"
                    href="{{ route('eventos.pago',['evento'=>$evento->id]) }}" role="button">Generar Pago</a>
                @endhasanyrole

                @role('Administrador')
                <a class="btn
                @if ($discount <> 0)
                    btn-info
                @else
                    btn-danger
                @endif
                d-block w-100 inline mb-2" href=" {{ route('discounts.create',['evento' => $evento->id]) }} "
                    role="button">Agregar descuento
                </a>
                @endrole

                @hasanyrole('Administrador|Planeacion')
                <a class="btn btn-info d-block w-100 inline mb-2"
                    href="{{  route('eventoservicios.create',['evento'=>$evento]) }}" role="button">Agregar o eliminar
                    Servicio</a>
                @endhasanyrole

                @hasanyrole('Administrador|Planeacion')
                @if (count($evento->tablecloth) >0)
                <a class="btn btn-info d-block w-100 inline mb-2"
                    href="{{ route('manteleria.create',['evento'=>$evento->id]) }}" role="button">Manteleria y
                    sillas</a>
                @else
                <a class="btn btn-danger d-block w-100 inline mb-2"
                    href="{{ route('manteleria.create',['evento'=>$evento->id]) }}" role="button">Manteleria y
                    sillas</a>
                @endif
                @endhasanyrole

                {{-- Bases florales --}}
                @hasanyrole('Administrador|Florista|Planeacion')
                <a class="btn
                @if ($evento->floralbase()->count() > 0)
                    btn-info
                @else
                    btn-danger
                @endif
                d-block w-100 inline mb-2" href="{{ route('basefloral.create',['evento'=>$evento->id])}}"
                    role="button">Bases florales</a>
                @endhasanyrole

                @role('Administrador')
                @if($monto >= 15000 && $admin)
                <a class="btn btn-info d-block w-100 inline mb-2"
                    href="{{ route('eventos.contrato',['evento'=>$evento->id]) }}" role="button">Generar Contrato</a>
                @endif
                @endrole

                {{-- Banquete --}}
                @hasanyrole('Administrador|Banquete')
                @if ($banquetExist == true)
                <a class="btn
                @if ($evento->banquet()->count()>0)
                    btn-info
                @else
                    btn-danger
                @endif
                d-block w-100 inline mb-2" href="{{route('banquetes.create', ['evento'=>$evento->id])}}"
                    role="button">Agregar banquete
                </a>
                @endif
                @endhasanyrole

            </div>
        </div>

        @role('Administrador')
        <div class="row justify-content-around">
            @if(count($evento->servicio))
            <div class="col-md-6 bg-white shadow p-3 mb-5 rounded text-center">
                {{-- Realicamos el listado de los servicios --}}
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre Servicios</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Cortesía</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evento->servicio as $servicio)
                        <tr>
                            <td scope="row">{{$servicio->nombre}}</td>
                            <td>{{$servicio->pivot->cantidad}}</td>
                            <td>$@dinero($servicio->pivot->costo * $servicio->pivot->cantidad)</td>
                            <td>@if ($servicio->pivot->regalo == 1)
                                Si
                                @else
                                No
                                @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        @endrole

        @hasanyrole('Administrador|Ventas|Planeacion')
        <div class="row justify-content-around">
            @if (count($pagos))
            <div class="col-md-6 bg-white shadow p-3 mb-5 rounded text-center">
                {{-- Realicamos el listado de los servicios --}}
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Fecha Pago</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                        <tr>
                            <td scope="row">{{$pago->created_at->format('d-m-Y')}}</td>
                            <td>{{$pago->tipo}}</td>
                            <td>$@dinero($pago->monto)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
        </div>
        @endhasanyrole

        {{-- Comentarios Livewire --}}
        @hasanyrole('Administrador|Ventas|Planeacion')
        @livewire('comments-index', ['evento' => $evento])
        @endhasanyrole
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    </div>
</div>
<div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Layout del evento</h5>
            </div>
            <div class="modal-body">
                @if (empty($evento->layout))
                <p>Aun no cuenta con layout, si gustas puedes subir uno a continuación</p>
                @else
                <img src="{{ Storage::url($evento->layout)}}" class="img-fluid" alt="">
                <p>Si deseas puedes actualizar la imagen.</p>
                @endif
                <form action="{{ route('eventos.layout',['evento'   =>  $evento->id]) }}" method="post"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <input type="file" name="layout" id="layout">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='close'>Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop
