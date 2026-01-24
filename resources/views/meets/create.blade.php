@extends('adminlte::page')

@section('title', 'Reuniones')

@section('content_header')
    <a href="{{ route('meets.index') }}" class="btn btn-info">Regresar</a>
    <h1 class="text-center">Crear una reunión</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('meets.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Motivo:</label>
                        <select name="reason" id="" class="form-control">
                            <option value="">--Selecciona un motivo--</option>
                            @foreach ($reasons as $reason)
                            <option value="{{$reason->id}}" {{ old('reason') == $reason->id ? 'selected' : '' }}>{{$reason->reason}}</option>
                            @endforeach
                        </select>
                        @error('reason')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Vendedor">Vendedor asignado:</label>
                        <select name="seller" id="" class="form-control">
                            <option value="">--Selecciona un vendedor--</option>
                            @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}" {{ old('seller') == $seller->id ? 'selected' : '' }}>{{$seller->name}}</option>
                            @endforeach
                        </select>
                        @error('seller')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cliente:</label>
                        <div class="input-group">
                            <select name="client" id="" class="form-control">
                                <option value="">--Selecciona un cliente--</option>
                                @foreach ($clients as $client)
                                <option value="{{$client->id}}" {{ old('client') == $client->id ? 'selected' : '' }}>{{$client->nombre}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <a href="{{ route('clientes.create') }}" target="_blank" class="btn btn-success" title="Crear nuevo cliente">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        @error('client')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Fecha:</label>
                        <input type="datetime-local" name="date" class="form-control" value="{{ old('date') }}">
                        @error('date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>



@stop

@section('css')
@stop

@section('js')
@stop
