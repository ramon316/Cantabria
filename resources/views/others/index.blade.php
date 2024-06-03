@extends('adminlte::page')

@section('title', 'Inventario varios')

@section('plugins.Sweetalert2', true)

@section('content_header')
<h1 class="text-center">Inventario varios</h1>
@stop

@section('content')
    <div class="container">
        @livewire('inventories.other-index')
    </div>
@stop

@section('css')
@stop

@section('js')
<script>
    Livewire.on('mostrarAlerta',inventoryId =>{
        Swal.fire({
            title: 'Estas seguro de eliminar el registro?',
            text: "No podrás recuperarlo",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminalo!'
            })
            .then((result) => {
            if (result.value== true) {
                Swal.fire(
                    'Registro eliminado!',
                    Livewire.emit('delete', inventoryId)
                )
            }
        })
    });
</script>
@stop
