@extends('adminlte::page')

@section('title', 'Reuniones')

@section('content_header')
    <h1 class="text-center">Retroalimentación de la Reunión</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 for="">{{$meet->reason->reason}} para {{$meet->user->name}}</h3>
                <h3 class="card-title">Reunión con el cliente {{ $meet->cliente->nombre }} el día
                    {{ $meet->start->format('d-m-Y H:i a') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('meets.update', ['meet' => $meet]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Resultado de la reunión</label>
                            <select name="contrato" id="" class="form-control">
                                <option value="" @if (is_null($meet->contrato)) selected                             
                                @endif>--Selecciona una opción--</option>
                                <option value="1" @if ($meet->contrato === 1) selected @endif>
                                    Si contrato</option>
                                <option value="0" @if ($meet->contrato === 0) selected @endif>
                                    No contrato</option>>No contrato</option>
                            </select>
                            @error('contrato')
                                <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="">Observaciones</label>
                            <textarea name="observacion" id="" class="form-control">{{$meet->observacion}}</textarea>
                            @error('observacion')
                                <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
