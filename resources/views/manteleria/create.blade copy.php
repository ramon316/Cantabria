@extends('adminlte::page')

@section('title', 'Manteleria')

@section('content_header')
    <h1 class="text-center">Guarda la manteleria del evento</h1>
@stop

@section('content')
<div id="app">
<div class="container">
<form method="POST" action="{{route('manteleria.store')}}" novalidate>
@csrf
<div class="row justify-content-between">
        <div class="col-md-5 text-center bg-white p-2 m-2">
            <h2>Información del evento</h2>
        </div>
        <div class="col-md-5 text-center bg-white p-2 m-2">
            <h2>Información del evento</h2>
        </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Mesas Imperiales:</label>
            <input 
            type="number"
            class="form-control @error('imperiales')
                is-invalid
            @enderror" 
            id="imperiales"
            name="imperiales"
            value="{{old('imperiales')}}"
            >
            @error('imperiales')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
            <small id="helpId" class="form-text text-muted">Ingresa el nímero de mesas imperiales a utilizar en el evento</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>Mesas Cuadradas a utilizar:</label>
        <input 
        type="number"
        class="form-control
        @error('cuadradas')
            is-invalid
        @enderror" 
        id="cuadradas"
        name="cuadradas"
        value="{{old('cuadradas')}}"
        >
        @error('cuadradas')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
        <small id="helpId" class="form-text text-muted">Ingresa el nímero de mesas cuadradas a utilizar en el evento</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>Mesas Redondas a utilizar:</label>
        <input 
        type="number"
        class="form-control @error('redondas')
            is-invalid
        @enderror" 
        id="redondas"
        name="redondas"
        value="{{old('redondas')}}"
        >
        @error('redondas')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
        <small id="helpId" class="form-text text-muted">Ingresa el nímero de mesas redondas a utilizar en el evento</small>
        </div>
    </div>
</div>
<div class="border p-2 mb-3">
<h5 class="text-center">Mantelería
</h5>
    <!--Mantel 1-->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group align-center">
            <input 
            type="number" 
            class="form-control"
            id="cantidad"
            name="cantidad[]"
            placeholder="Ingresa el numero de manteles" 
            >
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input 
                type="text" 
                class="form-control" 
                id="nombre"
                name="nombre[]"
                placeholder="Ingresa el nombre"
                >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" 
                id="tipo" 
                name="tipo[]">
                    <option value="">--Tipo de mesa--</option>
                    <option value="imperial">Imperial</option>
                    <option value="cuadrada">Cuadrada</option>
                    <option value="redonda">Redonda</option>
                </select>
            </div>
        </div>
        <!--Boton de agregar
        <div class="col align-self-center">
            <div class="form-group">
                <button class="btn text-white btn-info btn-sm btn-block" >Agregar</button>
            </div>
        </div>
        -->
    </div>
    <!--Mantel 2-->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group align-center">
            <input 
            type="number" 
            class="form-control"
            id="cantidad"
            name="cantidad[]"
            placeholder="Ingresa el numero de manteles">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input 
                type="text" 
                class="form-control" 
                id="nombre2"
                name="nombre[]"
                placeholder="Ingresa el nombre"
                >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" id="tipo2" name="tipo[]">
                    <option value="">--Tipo de mesa--</option>
                    <option value="imperial">Imperial</option>
                    <option value="cuadrada">Cuadrada</option>
                    <option value="redonda">Redonda</option>
                </select>
            </div>
        </div>
        <!--Boton de agregar
        <div class="col align-self-center">
            <div class="form-group">
                <button class="btn text-white btn-info btn-sm btn-block" >Agregar</button>
            </div>
        </div>
        -->
    </div>
    <!--Mantel 3-->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group align-center">
            <input 
            type="number" 
            class="form-control"
            id="cantidad"
            name="cantidad[]"
            placeholder="Ingresa el numero de manteles"
            >
            @error('cantidad3')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input 
                type="text" 
                class="form-control" 
                id="nombre"
                name="nombre[]"
                placeholder="Ingresa el nombre"
                >
                @error('nombre3')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" id="tipo" name="tipo[]">
                    <option value="">--Tipo de mesa--</option>
                    <option value="imperial">Imperial</option>
                    <option value="cuadrada">Cuadrada</option>
                    <option value="redonda">Redonda</option>
                </select>
                @error('tipo3')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <!--Boton de agregar
        <div class="col align-self-center">
            <div class="form-group">
                <button class="btn text-white btn-info btn-sm btn-block" >Agregar</button>
            </div>
        </div>
        -->
    </div>
    <!--Mantel 4-->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group align-center">
            <input 
            type="number" 
            class="form-control"
            id="cantidad"
            name="cantidad[]"
            placeholder="Ingresa el numero de manteles"
            >
            @error('cantidad4')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input 
                type="text" 
                class="form-control" 
                id="nombre"
                name="nombre[]"
                placeholder="Ingresa el nombre"
                >
                @error('nombre4')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" id="tipo" name="tipo[]">
                    <option value="">--Tipo de mesa--</option>
                    <option value="imperial">Imperial</option>
                    <option value="cuadrada">Cuadrada</option>
                    <option value="redonda">Redonda</option>
                </select>
                @error('tipo4')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <!--Boton de agregar
        <div class="col align-self-center">
            <div class="form-group">
                <button class="btn text-white btn-info btn-sm btn-block" >Agregar</button>
            </div>
        </div>
        -->
    </div>
    <!--Mantel 5-->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group align-center">
            <input 
            type="number" 
            class="form-control"
            id="cantidad"
            name="cantidad[]"
            placeholder="Ingresa el numero de manteles"
            >
            @error('cantidad5')
                <span class="text-danger error">
                {{$message}}
                </span>
            @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <input 
                type="text" 
                class="form-control" 
                id="nombre"
                name="nombre[]"
                placeholder="Ingresa el nombre"
                >
                @error('nombre5')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" id="tipo" name="tipo[]">
                    <option value="">--Tipo de mesa--</option>
                    <option value="imperial">Imperial</option>
                    <option value="cuadrada">Cuadrada</option>
                    <option value="redonda">Redonda</option>
                </select>
                @error('tipo5')
                <span class="text-danger error">
                {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <!--Boton de agregar
        <div class="col align-self-center">
            <div class="form-group">
                <button class="btn text-white btn-info btn-sm btn-block" >Agregar</button>
            </div>
        </div>
        -->
    </div>
</div>
<div class="border p-2">
    <h5 class="text-center">Bases para centros de mesas</h5>
    <div class="row ml-2">
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control @error('base')
                    is-invalid
                @enderror" 
                placeholder="Nombre de base"
                value="{{old('base')}}"
                >
                @error('base')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base" 
                value="{{old('base2')}}"
                >
                @error('base2')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base3')}}"
                >
                @error('base3')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base4')}}"
                >
                @error('base4')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base5')}}"
                >
                @error('base5')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base6')}}"
                >
                @error('base6')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base7')}}"
                >
                @error('base7')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" 
                name="base[]" 
                id="base" 
                class="form-control" 
                placeholder="Nombre de base"
                value="{{old('base8')}}"
                >
                @error('base8')
                    <span class="text-danger error">
                    {{$message}}
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</div>
</form>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop
