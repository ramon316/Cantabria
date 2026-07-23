@extends('adminlte::page')

@section('title', 'Validar Pagos')

@section('plugins.Sweetalert2', true)

@section('content_header')
<h1 class="text-center text-primary">Validación Global de Pagos</h1>
@stop

@section('content')
    <div class="container-fluid">
        @livewire('validar-pagos')
    </div>
@stop

@section('css')
@stop

@section('js')
<script>
    // Listener para mensajes simples de SweetAlert
    window.addEventListener('swal:modal', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
        });
    });

    // Listener para el proceso de rechazo con SweetAlert2
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('confirmarRechazo', pagoId => {
            Swal.fire({
                title: '¿Motivo del rechazo?',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Rechazar',
                showLoaderOnConfirm: true,
                preConfirm: (observaciones) => {
                    // Emitimos el evento al componente para que procese el rechazo
                    Livewire.emit('rechazar', pagoId, observaciones);
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '¡Rechazado!',
                        'El pago ha sido marcado para rechazo.',
                        'success'
                    )
                }
            })
        });
    });
</script>
@stop
