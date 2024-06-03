@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1 class="text-center">Clientes</h1>
@stop

@section('content')
    @livewire('clientes-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
@stop

@section('js')

@stop
