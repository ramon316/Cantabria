@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
<div class="container-fluid">
    <div class="row m-3 ">
      <div class="col-md-1">
        <a  class="btn btn-success" href="{{route('cotizacion.show', ['cotizacion'=>$cotizacion->id])}}">Regresar</a>
      </div>
      <div class="col-md-11">
        <h1 class="text-center">Agregar servicio</h1>
      </div>
    </div>
</div>
@stop

@section('content')

<div class="container">
    <!--Esta es el apartado de los mensajes-->
        @if(session('mensaje'))
        <div class="alert {{session('estilo')}} alert-dismissible fade show" role="alert">
        <strong>{{session('mensaje')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <div class="row justify-content-around">
            <div class="col-md-5 bg-white shadow p-4 mb-5 ml-5 rounded">
                <h4>Información del cliente</h4>
                <p><strong>Cliente: </strong>{{$cotizacion->cliente->nombre}}</p>
                <p><strong>Teléfino: </strong>{{$cotizacion->cliente->telefono}}</p>
                <p><strong>Email: </strong>{{$cotizacion->cliente->email}}</p>
                <p><strong>Dirección: </strong>C. {{$cotizacion->cliente->calle}} #{{$cotizacion->cliente->numero}} Col.{{$cotizacion->cliente->colonia}} C.P. {{$cotizacion->cliente->cp}}</p>
            </div>
            <div class="col-md-5 bg-white shadow p-3 mb-5 ml-5 rounded">
                <h4>Información de la cotizacion</h4>
                <p><strong>Tipo: </strong>{{$cotizacion->title}}</p>
                <p><strong>Horas: </strong>{{$cotizacion->horas}} horas</p>
                <p><strong>Fecha: </strong>{{$cotizacion->start->format('d-m-Y')}}</p>
                <p><strong>Invitados: </strong>{{$cotizacion->invitados}}</p>
                <p><strong>Precio: </strong> $@dinero($costoCotizacion) pesos</p>
            </div>
            @if(count($cotizacion->servicio)>0)
            <div class="col-md-5 bg-white shadow p-3 mb-5 ml-5 rounded">
              <div class="card">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Servicio</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($serviciosCotizacion as $servicioCotizacion)
                      <tr>
                        <td>{{$servicioCotizacion->nombre}}</td>
                        <td>{{$servicioCotizacion->pivot->cantidad}}</td>
                        <td>
                          <form method="POST" action=" {{ route('cotizacionservicio.destroy', ['servicio' => $servicioCotizacion->id, 'cotizacion'=>$cotizacion->id]) }}">
                            @method("delete")
                            @csrf
                            <button type="submit" 
                            class="btn btn-danger">Eliminar</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif
        </div>
<form method="POST" action="{{ route('cotizacionservicio.store')}}" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="servicio">Selecciona el servicio a agregar:</label>
                  <select class="form-control
                  @error('servicio')
                    is-invalid
                  @enderror"
                          value = "{{old('servicio')}}" 
                          name="servicio" 
                          id="servicio"
                      >
                    <option value="">--Selecciona un servicio--</option>
                  @foreach ($servicios as $servicio)
                    <option value={{$servicio->id}}>{{$servicio->nombre}}</option>
                  @endforeach
                  </select>
                  @error('servicio')
                    <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                  @enderror
                  <small id="helpNombre" class="form-text text-muted">Selecciona el servicio que deseas agregar al avento</small>
              </div>
            </div>
           <div class="col-md-4">
              <div class="form-group">
                <label>Cantidad del servicio:</label>
                  <input type="number"
                    class="form-control
                    @error('cantidad')
                      is-invalid
                    @enderror"
                    name="cantidad"
                    id="cantidad"
                    value={{old('cantidad')}}>
                    @error('cantidad')
                      <div class="invalid-feedback d-block" role="alert"> {{$message}}</div>
                    @enderror
                  <small id="helpId" class="form-text text-muted">Ingresa la cantidad en valor numérico de la cantidad de servicios o platillos que necesitas.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regalo">Es un servicio de regalo:</label>
                  <select class="form-control"
                          value = "{{old('regalo')}}" 
                          name="regalo" 
                          id="regalo"
                      >
                  <option value="">--Selecciona una opción--</option>
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  </select>
                  <small id="helpNombre" class="form-text text-muted">Selecciona un "SI", si este servicio no se cobrará al cliente</small>
              </div>
            </div>

            <div class="form-group">
              <input type="hidden" id="cotizacion" name="cotizacion" value="{{$cotizacion->id}}">
            </div>
        </div>

      <div class="row">
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
      </div>
    </form>

    <div class="row">
      <table>
        
      </table>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop
