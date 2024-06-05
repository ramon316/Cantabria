@extends('adminlte::page')

@section('title', 'Editar precio')

@section('content_header')
    <h1 class="text-center">Edit precios</h1>
@stop

@section('content')
<div class="container">
    <form method="POST" action="{{ route('precios.update', ['precio' => $precio->id])}}" novalidate>
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="invitados" class="">Cantidad de invitados:</label>
                <input type="number"
                class="form-control @error('invitados') is-invalid @enderror" 
                name="invitados" 
                id="invitados" 
                placeholder=""
                value="{{$precio->invitados}}">
                @error('invitados')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingresa con número la cantidad de invitados para este gurpo de precios.</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="renta" class="">Costo de la renta:</label>
                <input type="number"
                class="form-control @error('renta') is-invalid @enderror" 
                name="renta" 
                id="renta" 
                placeholder=""
                value="{{$precio->renta}}">
                @error('renta')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto que costará la renta del salon.</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="decoracion" class="">Costo de la decoración:</label>
                <input type="number"
                class="form-control @error('decoracion') is-invalid @enderror" 
                name="decoracion" 
                id="decoracion" 
                placeholder=""
                value="{{$precio->decoracion}}">
                @error('decoracion')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto que costará la decoración del salon.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="dulces" class="">Costo de la mesa de dulces:</label>
                <input type="number"
                class="form-control @error('dulces') is-invalid @enderror" 
                name="dulces" 
                id="dulces" 
                placeholder=""
                value="{{$precio->dulces}}">
                @error('dulces')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto que costará la mesa de dulces.</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="postres" class="">Costo de la barra de postres:</label>
                <input type="number"
                class="form-control @error('decoracion') is-invalid @enderror" 
                name="postres" 
                id="postres" 
                placeholder=""
                value={{$precio->postres}}>
                @error('postres')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto que costará la barra de postres.</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="bebidas" class="">Costo de la barra de bebidas:</label>
                <input type="number"
                class="form-control @error('bebidas') is-invalid @enderror" 
                name="bebidas" 
                id="bebidas" 
                placeholder=""
                value="{{$precio->bebidas}}">
                @error('bebidas')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto que costará la barra de bebidas.</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="pastel" class="">Costo del pastel:</label>
                <input type="number"
                class="form-control @error('pastel') is-invalid @enderror" 
                name="pastel" 
                id="pastel" 
                placeholder=""
                value="{{$precio->pastel}}">
                @error('pastel')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingrese el monto del costo del pastel para el evento.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="meseros" class="">Cantidad de meseros:</label>
                <input type="number"
                class="form-control @error('meseros') is-invalid @enderror" 
                name="meseros" 
                id="meseros" 
                placeholder=""
                value="{{$precio->meseros}}">
                @error('meseros')
                    <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                @enderror
                <small class="fomr-text text-muted">Ingresa la cantidad de meseros que se necesitan para atender el evento.</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="dias">Días</label>
                <select class="form-control" name="dias" id="dias">
                    <option value="1">Viernes y Sábado</option>
                    <option value="2" 
                    @if($precio->dias>1)
                        selected
                    @endif>
                    Lúnes, Martes, Miercoles, Jueves y Domingo</option>
                </select>
                <small class="fomr-text text-muted">Ingresa los días en los que son efectivos estos precios.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" alig value="Guardar Cambios">
        </div>
    </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop