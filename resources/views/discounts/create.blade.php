@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container">
    <h1 class="text-center">Agregar descuentos</h1>
</div>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Agregar un descuento al evento</h5>
                <div class="card-body">
                    @if (is_null($discount))
                    <label for="">Ingresa la cantidad a descontar:</label>
                    <form action=" {{route('discounts.store')}} " method="POST">
                        @csrf
                        <input type="number" class="form-control mb-2" name="amount" value="{{old('amount')}}">
                        @error('amount')
                        <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                        @enderror
                        <small id="helpId" class="form-text text-muted mb-2">Ingresa solo números, rango de $1.00 a $10,000.00</small>
                        <input type="hidden" value="{{$evento->id}}" name="evento">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    @else
                        Este evento ya cuenta con un descuento. Elimínalo si deseas agregar otra cantidad.
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Descuento agregados</h5>
                <div class="card-body">
                    @if (is_null($discount))
                    <p>Este evento aun no cuenta con descuento.</p>
                    @else
                    <p>El descuento que tiene el evento es de <strong>$ @dinero($discount->amount)</strong></p>
                    @endif
                </div>
                @if (is_null($discount))
                <div class="card-footer">

                </div>
                @else
                <div class="card-footer">
                    <form action="{{ route('discounts.destroy', ['discount' => $discount->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type="submit" value="Eliminar descuento">
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
