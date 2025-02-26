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
            margin-top: 1.5%;
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
                <label>Por este medio y en respuesta a su solicitud, le presento la propuesta para la realización de su
                    evento. Esta cotización incluye:</label>
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
                    <li>Estacionamiento privado</li>
                    <li>Personal de seguridad</li>
                    <li>Personal de limpieza</li>
                    <li>Meseros</li>
                    <li>Barman</li>
                    <li>Capitán de meseros</li>
                    <li>Descorche libre</li>
                    <li>Áreas de Fumadores</li>
                    <li>Suministro de bebidas a cargo del servicio de meseros (no brindamos el servicio de botella en
                        mesa)</li>
                    <li>Coordinación Básica</li>
                    <li>Una prueba de mantelería y sillas previa al evento</li>
                </ul>
            </div>
        </div>

        <div class="pagina">
            {{-- Verificamos si existe la decoración --}}
            @if ($ExistDecoracion != null)
            <div class="row">
                <label>Producción Floral Hibrida:</label>
                <ul>
                    <li>Centro de Mesa</li>
                    <li>Mesa Principal</li>
                    <li>Recibidor</li>
                    <li>Lobby</li>
                </ul>
                <label>(No incluye flor ni follaje extrafino)</label>
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

            <div class="row marginTop">
                <label><strong>Inversión $@dinero($costo) - ({{ $costoTexto }} 00/100 m.n.)</strong></label>
            </div>
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
                    <li>Sin factura: solo pago en efectivo</li>
                    <li>Con factura: + IVA, cheques, transferencia y pago con tarjeta (solo aceptamos VISA y
                        Master Card. Se agrega comisión adicional en pago con tarjeta)</li>
                </ul>
            </div>
        </div>
</body>

</html>
