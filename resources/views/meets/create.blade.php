@extends('adminlte::page')

@section('title', 'Reuniones')

@section('content_header')
    <h1 class="text-center">Crear una reunión</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('meets.store') }}" method="post">
            @csrf
            @method('POST')
            <idv class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Motivo:</label>
                        <select name="reason" id="" class="form-control">
                            <option value="">--Selecciona un motivo--</option>
                            @foreach ($reasons as $reason)
                            <option value="{{$reason->id}}">{{$reason->reason}}</option>
                            @endforeach
                        </select>
                        @error('reason')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </idv>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Vendedor">Vendedor asignado:</label>
                        <select name="seller" id="" class="form-control">
                            <option value="">--Selecciona un vendedor--</option>
                            @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->name}}</option>
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
                        <select name="client" id="" class="form-control">
                            <option value="">--Selecciona un cliente--</option>
                            @foreach ($clients as $client)
                            <option value="{{$client->id}}">{{$client->nombre}}</option>
                            @endforeach
                        </select>
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
                        <input type="datetime-local" name="date" class="form-control">
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
