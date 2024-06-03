<!--Plantilla AdminLTE-->
@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
<div class="container">
    <h1 class="text-center">Calendario de eventos Cantabria</h1>
</div>
@stop

@section('content')
    <div id="app">
        <fullcalendar-component>
        </fullcalendar-component>
        
        <!-- Modal -->
        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body">
                       <label>Fecha:</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a class="btn" href="#">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @routes 
    <script src="{{ asset('js/app.js') }}"></script>
@stop


