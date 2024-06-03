@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<div class="container">
    <h1 class="text-center">Lista de servicios</h1>
</div>
@stop

@section('content')
    @livewire('services-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
@stop
