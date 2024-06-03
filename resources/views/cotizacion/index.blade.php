@extends('adminlte::page')

@section('title', 'Cotización')

@section('content_header')
    <h1 class="text-center">Visualización de tus cotizaciones</h1>
@stop

@section('content')
    @livewire('cotizacion-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop