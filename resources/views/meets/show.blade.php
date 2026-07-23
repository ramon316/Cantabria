@extends('adminlte::page')

@section('title', 'Reuniones')

@section('content_header')
    <a href="{{ route('meets.index') }}" class="btn btn-info">Regresar</a>
    <h1 class="text-center">Retroalimentación de la Reunión</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 for="">{{$meet->reason->reason}} para {{$meet->user->name}}</h3>
                <h3 class="card-title">Reunión con el cliente {{ $meet->cliente->nombre }} el día
                    {{ $meet->start->format('d-m-Y H:i a') }}</h3><br>
                @if($futureEvents->count() > 0)
                    <h3 class="card-title">
                        @foreach($futureEvents as $key => $event)
                            @if($key === 0)
                                Cuenta con un evento el día {{ $event->start->format('d-m-Y') }}
                            @else
                                y otro evento el día {{ $event->start->format('d-m-Y') }}
                            @endif
                        @endforeach
                    </h3>
                <br>
                @endif
                <h3 class="card-title">El teléfono del cliente es {{$meet->cliente->telefono}}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('meets.update', ['meet' => $meet]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Resultado de la reunión</label>
                            <select name="resultado" id="" class="form-control">
                                <option value="" @if (is_null($meet->resultado)) selected @endif>--Selecciona una opción--</option>
                                @if (in_array($meet->reason->reason, ['Cliente nuevo primera visita', 'Cliente nuevo segunda visita']))
                                    <option value="contrato" @if ($meet->resultado === 'contrato') selected @endif>Contrato</option>
                                    <option value="no_contrato" @if ($meet->resultado === 'no_contrato') selected @endif>No contrato</option>
                                @else
                                    <option value="realizada" @if ($meet->resultado === 'realizada') selected @endif>Realizada</option>
                                    <option value="no_realizada" @if ($meet->resultado === 'no_realizada') selected @endif>No realizada</option>
                                @endif
                            </select>
                            @error('resultado')
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
