@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<h1 class="text-center">Listado de eventos</h1>
@stop

@section('content')
    @livewire('eventos-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop