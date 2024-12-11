@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container">
    <h1 class="text-center">Creación de evento</h1>
</div>
@stop

@section('content')

<div class="container">
    @livewire('create-event')
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

@stop
