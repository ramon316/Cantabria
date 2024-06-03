@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
<div class="container">
    <h1 class="text-center">Creación de evento</h1>
</div>
@stop

@section('content')

<div class="container">
    <form method="POST" action="{{ route('eventos.store')}}" novalidate>
        @csrf
        <!--Esta es el apartado de los mensajes-->
        @if(session('mensaje'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Lo siento...</strong> {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="cliente">Cliente</label>
                <select class="form-control"
                    value = "{{old('cliente')}}"
                    name="cliente"
                    id="cliente"
                >
                    {{-- Selección de cliente --}}
                    <option value="">--Selecciona al cliente--</option>
                @foreach($clientes as $id => $nombre)
                    <option value="{{$id}}"> {{$nombre}} </option>
                @endforeach

                </select>
                @error('cliente')
                    <div class="invalid-feedback" role="alert">
                    {{$message}}
                    </div>
                @enderror
                </div>
            </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="evento">Selecciona el tipo de evento:</label>
                <select class="form-control"
                        value = "{{old('evento')}}"
                        name="evento"
                        id="evento"
                    >
                {{-- Selección de cliente --}}
                <option value="">--Selecciona el evento--</option>
                @foreach ($tipos as $tipo)
                <option value="{{$tipo->tipo}}">{{$tipo->tipo}}</option>
                @endforeach
                </select>
                <small id="helpNombre" class="form-text text-muted">Selecciona el tipo de evento que deseas crear</small>
            </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="horas">Cantidad de horas</label>
                <input
                    type="number"
                    class="form-control @error('horas') is-invalid @enderror"
                    name="horas"
                    id="horas"
                    aria-describedby="helpId"
                    value = "{{old('horas')}}"
                >
                <small id="helpId" class="form-text text-muted">Solo número</small>
                @error('horas')
                    <div class="invalid-feedback d-block" role="alert">El campo de las horas del evento es obligatorio</div>
                @enderror
                </div>
            </div>
      </div>


        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input
                    type="date"
                    class="form-control @error('start') is-invalid @enderror"
                    name="start"
                    id="start"
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{old('start')}}"
                >
                <small id="helpId" class="form-text text-muted">Ingresa la fecha de inicio del evento</small>
                @error('start')
                    <span
                    class="invalid-feedback d-block" role="alert"> El campo fecha del evento es obligatorio
                    </span>
                @enderror
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-group">
                <label for="end">Fecha de finalización</label>
                <input
                    type="date"
                    class="form-control @error('end') is-invalid @enderror"
                    name="end"
                    id="end"
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{old('end')}}"
                >
                <small id="helpId" class="form-text text-muted">Ingresa la fecha de finalización del evento</small>
                @error('end')
                    <span
                    class="invalid-feedback d-block" role="alert"> El campo fecha del evento es obligatorio
                    </span>
                @enderror
                </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="">Invitados</label>
                <input type="number"
                  class="form-control" name="invitados" id="invitados" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Ingresa la cantidad de invitados para este evento</small>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>

    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{ asset('js/evento.js') }}"></script>
@stop
