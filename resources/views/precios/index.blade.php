@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1 class="text-center">Lista de Precios</h1>
@stop

@section('content')
    <div id="app">
        <div class="text-center mb-5">
        </div>
        <div class="col-md-10 mx-auto bg-white p-3">  
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th>Invitados</th>
                    <th>Renta</th>
                    <th>Decoración</th>
                    <th>Mesa de Dulces</th>
                    <th>Mesa de postres</th>
                    <th>Bebidas</th>
                    <th>Pastel</th>
                    <th>Días validos</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($precios as $precio)
                <tr>
                    <td scope="row">{{$precio->invitados}}</td>
                    <td>@dinero($precio->renta) </td>
                    <td>@dinero($precio->decoracion)</td>
                    <td>@dinero($precio->dulces)</td>
                    <td>@dinero($precio->postres)</td>
                    <td>@dinero($precio->bebidas)</td>
                    <td>@dinero($precio->pastel)</td>
                    <td>
                    @if($precio->dias === 1) 
                        V y S
                    @else
                        L, M, Mi, J y D
                    @endif
                    </td>
                    <td>{{$precio->año}}</td>
                    <td>
                    <!--Esto lo hacemos con la ruta-->
                        <a name="" id="" class="btn btn-primary d-block w-100 mb-2 inline" href="{{route('precios.edit',['precio'=>$precio->id]) }}" role="button">Editar</a>
                        <!--Vamos a usar vue para la eliminación del cliente-->
                        <eliminar-precio
                        precio-id={{$precio->id}}
                        ></eliminar-precio>
                    </td>
                </tr>    
                @endforeach
            </tbody>
            <div class="col-12 ,t-4 justify-content-center d-flex">
                {{$precios->links('pagination::bootstrap-4')}}
            </div>
        </table>
        </div>

    </div>
@stop

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
@stop