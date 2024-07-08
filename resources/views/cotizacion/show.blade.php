@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<a  class="btn btn-success btn-sm" href="{{route('cotizacion.index')}}">Regresar</a>
@stop

@section('content')
    @livewire('quoter-create', ['cotizacion' => $cotizacion])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop
