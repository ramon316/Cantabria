@extends('adminlte::page')

@section('title', 'Cotización')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('cotizacion.index')}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Genera tu cotización</h1>
      </div>
    </div>
</div>
@stop

@section('content')
<div class="container">
    <form method="POST" action="{{ route('cotizacion.store')}}" novalidate>
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
                <option value="">--Selecciona un cliente--</option>
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}"> {{$cliente->nombre}} </option>
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
                <option value="">--Selecciona un tipo de evento--</option>
                <option value="boda">Boda</option>
                <option value="capacitacion">Capacitación</option>
                <option value="graduacion">Graducación</option>
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

            <div class="col-md-3">
                <div class="form-group">
                  <label for="">Días de validez</label>
                  <select name="validez" id="validez" class="form-control">
                    <option value="">--Selecciona la cantidad de días--</option>
                    <option value="15">15 días</option>
                    <option value="30">30 días</option>
                  </select>
                  <small id="helpId" class="form-text text-muted">Selecciona la cantidad de día de validez a partir de su creación</small>
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
@stop

@section('js')
@stop