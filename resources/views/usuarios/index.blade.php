<!--Plantilla AdminLTE-->
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="container">
    <h1 class="text-center">Lista de usuarios</h1>
</div>
@stop

@section('content')
    @livewire('usuarios-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop


