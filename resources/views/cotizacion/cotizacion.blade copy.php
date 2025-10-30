<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<head>
    <meta charset="utf-8" />
    <!-- Styles -->
    <style>
        html {
            margin: 20pt;
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            /* background-image: url({{ public_path('./image/fondoCarta.jpeg') }}); */
            font-family: Tahoma, "Trebuchet MS", sans-serif;
        }

        .fondo {
            margin-top: 70px;
            margin-left: 2rem;
            margin-right: 2rem;
            text-align: justify;
        }

        .pagina {
            margin-top: 80px;
        }

        h3 {
            text-align: center;
        }

        p {
            text-align: justify;
            line-height: 40%;
        }

        label,
        li {
            text-align: justify;
            line-height: 90%;
            margin-top: 0.5%;
        }

        .page-break {
            page-break-after: always;
        }

        hr {
            color: red;
        }

        .mayuscula {
            text-transform: uppercase;
        }

        .marginTop {
            margin-top: 2rem;
        }

        .textCenter {
            text-align: center;
        }
    </style>
</head>
<title>Cotizacion</title>

<body>
    <div class="fondo">
        <div class="pagina">
            <div class="row">
                <p><strong>Cliente: {{ $cotizacion->cliente->nombre }}</strong></p>
                <p><strong>Fecha del Evento: </strong>{{ $eventDay }}</p>
                <p><strong>Tipo de Evento: </strong>{{$cotizacion->subtitle}} - {{$cotizacion->comment}}</p>
                <p><strong>Teléfono: </strong>{{ $cotizacion->cliente->telefono }}</p>
                <p><strong>Número de personas: </strong>{{ $cotizacion->invitados }} personas</p>
                <p><strong>Fecha de Cotización: </strong>{{ $today }}</p>
            </div>
            <hr>
            <div class="row">
                <label>Por este medio y en respuesta a su solicitud, le presento la propuesta para la realización de su evento. Esta cotización incluye:</label>
            </div>
            <div class="row">
                <ul>
                    <li>Renta de Instalaciones en el horario indicado</li>
                    <li>Sillas y mesas</li>
                    <li>Pista de baile</li>
                    <li>Escenario</li>
                    <li>Refresco y hielo ilimitado</li>
                    <li>Permiso de gobernación</li>
                    <li>Vaso de cristal</li>
                    <li>Mantelería de fina</li>
                    <li>Estacionamiento privado con personal</li>
                    <li>Personal de seguridad y estacionamiento</li>
                    <li>Personal de limpieza</li>
                    <li>Personal de Mantenimiento</li>
                    <li>Meseros, Barman, Capitán de meseros y personal en baños</li>
                    <li>Suministro de bebidas a cargo del servicio de meseros (no brindamos el servicio de botella en mesa)</li>
                    <li>Áreas de Fumadores </li>
                    <li>Coordinación Básica en el evento</li>
                    <li>Prueba de mantelería y sillas </li>
                </ul>
            </div>
            {{-- Verificamos si existe la decoración --}}
            @if ($ExistDecoracion != null)
            <div class="row">
                <label>PRODUCCIÓN FLORAL HÍBRIDA:</label>
                <ul>
                    <li>Centros de Mesa de flor artificial y centros de mesa de flor natural (NO INCLUYE FLOR NI FOLLAJE EXTRA FINO)</li>
                </ul>
                <label class="textCenter">Cotización válida únicamente para
                    <strong>{{ $cotizacion->invitados }}</strong> invitados, sujeto a disponibilidad.</label>
            </div>
            @endif
            @if ($servicios->isnotempty())
            <div class="row marginTop">
                <label>Servicio Adicional:</label>
                @foreach ($servicios as $servicio)
                <ul>
                    <li>{{ $servicio->nombre }}: $@dinero($servicio->pivot->costo * $servicio->pivot->cantidad)</li>
                </ul>
                @endforeach
            </div>
            @endif

            @if ($servicesCortesy->isnotempty())
            <div class="row marginTop">
                <label>SERVICIOS DE CORTESIA:</label>
                @foreach ($servicesCortesy as $service)
                <ul>
                    <li>{{ $service->nombre }}{{-- : $@dinero($service->pivot->costo * $service->pivot->cantidad) --}}
                    </li>
                </ul>
                @endforeach
            </div>
            @endif

            @if ($descuento > 0)
            <div class="row marginTop">
                <label>Subtotal: $@dinero($costoSinDescuento)</label>
                <label>Descuento: -$@dinero($descuento)</label>
                <label><strong>Inversión Total: $@dinero($costo) - ({{ $costoTexto }} 00/100 m.n.)</strong></label>
            </div>
            @else
            <div class="row marginTop">
                <label><strong>Inversión $@dinero($costo) - ({{ $costoTexto }} 00/100 m.n.)</strong></label>
            </div>
            @endif
            <div class="row marginTop">
                <label>Términos y condiciones</label>
                <ul>
                    <li>Anticipo de $15,000.00 (QUINCE MIL PESOS 00/100 m.n.)</li>
                    <li>Cotización vigente al {{$end}}. Sujeto a disponibilidad.</li>
                    <li>Alimentos y decoración exclusivo de Cantabria Salón de Eventos (no se permiten
                        proveedores externos)</li>
                </ul>
                <label>Formas de pago:</label>
                <ul>
                    <li>Sin factura: Solo pago en efectivo</li>
                    <li>Con factura: Cheques y transferencia</li>
                </ul>
            </div>
        </div>
</body>

</html>
