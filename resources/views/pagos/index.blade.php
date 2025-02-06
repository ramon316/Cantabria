@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-info" href="{{route('eventos.show',['evento'=>$evento->id])}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Captura de pagos</h1>
      </div>
    </div>
</div>
@stop

@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4 bg-white p-2 mb-3 shadow">
                <label>Cliente: {{$evento->cliente->nombre}}</label><br>
                <label>Número de evento: {{$evento->id}}</label><br>
                <label>Tipo del evento: {{$evento->title}}</label><br>
                <label>Fecha: {{$evento->start->format('d-m-Y')}}</label>
            </div>
            <div class="col-md-4 shadow-lg bg-white p-2 mb-3">
                <label for="">Costo del evento: @dinero($costoEvento)</label><br>
                <label for="">Cantidad pagada del evento: $ @dinero($pagado)</label>
            </div>
        </div>
        <form method="POST" action="{{ route('pagos.store')}}">
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo">Tipo de Pago:</label>
                        <select class="form-control
                        @error('tipo')
                            is-invalid
                        @enderror" name="tipo" id="tipo">
                        <option value="">--Tipo--</option>
                        <option value="abono">Abono</option>
                        <option value="anticipo">Anticipo</option>
                        <option value="liquidacion">Liquidación</option>
                        </select>
                        @error('tipo')
                            <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="">Monto</label>
                    <input type="number"
                        class="form-control
                        @error('monto')
                            is-invalid
                        @enderror"
                        name="monto" id="monto" aria-describedby="helpId" placeholder=""
                        value="{{ old('monto') }}">
                        @error('monto')
                            <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                        @enderror

                    <small id="helpId" class="form-text text-muted">Ingresa el monto del abono al avento</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="cuenta">Cuenta</label>
                      <select class="form-control
                      @error('cuenta')
                        is-invalid
                      @enderror" name="cuenta" id="cuenta">
                        <option value="">--Cuenta--</option>
                        @foreach ($cuentas as $cuenta)
                            <option value="{{$cuenta->id}}">{{$cuenta->cuenta}}</option>
                        @endforeach
                      </select>
                      @error('cuenta')
                            <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                        @enderror
                    </div>
                </div>

                <input type="hidden"
                name="evento" id="evento"
                value="{{$evento->id}}">

                <input type="hidden"
                name="cliente" id="cliente"
                value="{{$evento->cliente_id}}">


                <div class="col-md-4">
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" alig value="Guardar">
                    </div>
                </div>
            </div>
        </form>
        @livewire('payments-list',['evento'=>$evento])
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
