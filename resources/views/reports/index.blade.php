@extends('adminlte::page')

@section('title', 'Reportes')

@section('plugins.Chartjs', true)


@section('content_header')
<h1 class="text-center">Reportes</h1>
@stop

@section('content')
<div class="container-fluid">
    {{-- <div class="row bg-white shadow mb-2 p-2">
        <div class="col-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
            </svg>
            Eventos
        </div>
        <div class="col-md-3">
            <span>Tipo:</span>
            <select class="form-control" name="typeEvent" wire:model.defer="typeEvent">
                <option value="" disabled>--Selecciona una opcion--</option>
                <option value="boda">Boda</option>
                <option value="capacitacion">Capacitación</option>
                <option value="graduacion">Graducación</option>
                <option value="xv">XV años</option>
            </select>
        </div>
        <div class="col-md-2">
            <span>Fecha inicial:</span>
            <input type="date" name="start" class="form-control">
        </div>
        <div class="col-md-2">
            <span>Fecha Final:</span>
            <input type="date" name="end" class="form-control">
        </div>
        <div class="col-md-2">
            <span>Usuarios:</span>
            <select name="user" id="" class="form-control">
                <option value="">--Usuarios--</option>
            </select>
        </div>
        <div class="col-md-2">
            <a href="" class="btn btn-primary mt-4 w-full">
                Aplicar
            </a>
        </div>
    </div> --}}
    <div class="row bg-white shadow">
        <div class="col-md-6">
            {!! $chartMonths->renderHtml() !!}
        </div>
        <div class="col-md-6">
            {!! $chartTitle->renderHtml() !!}
        </div>
    </div>
</div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
{!! $chartMonths->renderChartJsLibrary() !!}
{!! $chartMonths->renderJs() !!}
{!! $chartTitle->renderJs() !!}
@stop