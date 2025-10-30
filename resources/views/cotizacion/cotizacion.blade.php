<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Cotización</title>
    <!-- Styles optimizados para DomPDF -->
    <style>
        @page {
            margin: 120pt 60pt 80pt 60pt;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "DejaVu Sans", Helvetica, Arial, sans-serif;
            font-size: 11pt;
            color: #333333;
            line-height: 1.4;
        }

        /* Espacio para membrete superior */
        .header-space {
            height: 80px;
            display: block;
        }

        /* Espacio para pie de página */
        .footer-space {
            height: 60px;
            display: block;
        }

        /* Contenedor principal */
        .contenido {
            padding: 0;
        }

        /* Información del cliente */
        .info-cliente {
            margin-bottom: 20px;
        }

        .info-cliente p {
            margin: 5px 0;
            line-height: 1.4;
        }

        /* Línea divisoria */
        hr {
            border: none;
            border-top: 2px solid #d32f2f;
            margin: 15px 0;
        }

        /* Secciones */
        .seccion {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .seccion-titulo {
            font-weight: bold;
            font-size: 12pt;
            color: #2c3e50;
            margin-bottom: 10px;
            margin-top: 15px;
            text-transform: uppercase;
        }

        /* Listas */
        ul {
            margin: 8px 0 8px 20px;
            padding: 0;
            list-style-type: disc;
        }

        li {
            margin: 5px 0;
            line-height: 1.4;
            text-align: justify;
        }

        /* Tabla de servicios */
        .tabla-servicios {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        .tabla-servicios th {
            background-color: #e8e8e8;
            color: #2c3e50;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #d32f2f;
        }

        .tabla-servicios td {
            padding: 8px 10px;
            border-bottom: 1px solid #dddddd;
        }

        .tabla-servicios tr:last-child td {
            border-bottom: none;
        }

        .tabla-servicios .texto-derecha {
            text-align: right;
        }

        /* Totales */
        .seccion-totales {
            margin-top: 25px;
            margin-bottom: 20px;
        }

        .seccion-totales p {
            margin: 5px 0;
            font-size: 11pt;
        }

        .total-principal {
            font-weight: bold;
            font-size: 13pt;
            color: #2c3e50;
            margin-top: 10px;
        }

        /* Términos y condiciones */
        .terminos {
            margin-top: 25px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #d32f2f;
        }

        .terminos p {
            margin: 5px 0;
            line-height: 1.4;
        }

        /* Utilidades */
        .texto-centrado {
            text-align: center;
        }

        .texto-justificado {
            text-align: justify;
        }

        .negrita {
            font-weight: bold;
        }

        .mayuscula {
            text-transform: uppercase;
        }

        /* Saltos de página */
        .page-break {
            page-break-after: always;
        }

        .no-break {
            page-break-inside: avoid;
        }

        /* Nota importante */
        .nota-validez {
            background-color: #fff3cd;
            padding: 10px;
            margin: 15px 0;
            border-left: 4px solid #ffc107;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Espacio para membrete superior (reservado para hoja pre-impresa) -->
    <div class="header-space"></div>

    <div class="contenido">
        <!-- Información del Cliente -->
        <div class="info-cliente no-break">
            <p><strong>Cliente:</strong> {{ $cotizacion->cliente->nombre }}</p>
            <p><strong>Fecha del Evento:</strong> {{ $eventDay }}</p>
            <p><strong>Tipo de Evento:</strong> {{$cotizacion->subtitle}} - {{$cotizacion->comment}}</p>
            <p><strong>Teléfono:</strong> {{ $cotizacion->cliente->telefono }}</p>
            <p><strong>Número de personas:</strong> {{ $cotizacion->invitados }} personas</p>
            <p><strong>Fecha de Cotización:</strong> {{ $today }}</p>
        </div>

        <hr>

        <!-- Introducción -->
        <div class="seccion no-break">
            <p class="texto-justificado">Por este medio y en respuesta a su solicitud, le presento la propuesta para la realización de su evento. Esta cotización incluye:</p>
        </div>

        <!-- Servicios Incluidos -->
        <div class="seccion">
            <ul>
                <li>Renta de Instalaciones en el horario indicado</li>
                <li>Sillas y mesas</li>
                <li>Pista de baile</li>
                <li>Escenario</li>
                <li>Refresco y hielo ilimitado</li>
                <li>Permiso de gobernación</li>
                <li>Vaso de cristal</li>
                <li>Mantelería fina</li>
                <li>Estacionamiento privado con personal</li>
                <li>Personal de seguridad y estacionamiento</li>
                <li>Personal de limpieza</li>
                <li>Personal de Mantenimiento</li>
                <li>Meseros, Barman, Capitán de meseros y personal en baños</li>
                <li>Suministro de bebidas a cargo del servicio de meseros (no brindamos el servicio de botella en mesa)</li>
                <li>Áreas de Fumadores</li>
                <li>Coordinación Básica en el evento</li>
                <li>Prueba de mantelería y sillas</li>
            </ul>
        </div>

        {{-- Verificamos si existe la decoración --}}
        @if ($ExistDecoracion != null)
        <div class="seccion no-break">
            <p class="seccion-titulo">Producción Floral Híbrida:</p>
            <ul>
                <li>Centros de Mesa de flor artificial y centros de mesa de flor natural (NO INCLUYE FLOR NI FOLLAJE EXTRA FINO)</li>
            </ul>
            <div class="nota-validez">
                Cotización válida únicamente para <strong>{{ $cotizacion->invitados }}</strong> invitados, sujeto a disponibilidad.
            </div>
        </div>
        @endif

        {{-- Servicios Adicionales --}}
        @if ($servicios->isnotempty())
        <div class="seccion no-break">
            <p class="seccion-titulo">Servicios Adicionales:</p>
            <table class="tabla-servicios">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th class="texto-derecha">Cantidad</th>
                        <th class="texto-derecha">Costo Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->nombre }}</td>
                        <td class="texto-derecha">{{ $servicio->pivot->cantidad }}</td>
                        <td class="texto-derecha">$@dinero($servicio->pivot->costo * $servicio->pivot->cantidad)</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        {{-- Servicios de Cortesía --}}
        @if ($servicesCortesy->isnotempty())
        <div class="seccion no-break">
            <p class="seccion-titulo">Servicios de Cortesía:</p>
            <ul>
                @foreach ($servicesCortesy as $service)
                <li>{{ $service->nombre }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Inversión Total --}}
        <div class="seccion-totales no-break">
            @if ($descuento > 0)
                <p>Subtotal: <strong>$@dinero($costoSinDescuento)</strong></p>
                <p style="color: #d32f2f;">Descuento: <strong>-$@dinero($descuento)</strong></p>
                <p class="total-principal">INVERSIÓN TOTAL: $@dinero($costo)</p>
                <p>({{ $costoTexto }} 00/100 m.n.)</p>
            @else
                <p class="total-principal">INVERSIÓN: $@dinero($costo)</p>
                <p>({{ $costoTexto }} 00/100 m.n.)</p>
            @endif
        </div>

        {{-- Términos y Condiciones --}}
        <div class="terminos no-break">
            <p class="seccion-titulo">Términos y Condiciones</p>
            <ul>
                <li>Anticipo de $15,000.00 (QUINCE MIL PESOS 00/100 m.n.)</li>
                <li>Cotización vigente al {{$end}}. Sujeto a disponibilidad.</li>
                <li>Alimentos y decoración exclusivo de Cantabria Salón de Eventos (no se permiten proveedores externos)</li>
            </ul>

            <p class="seccion-titulo" style="margin-top: 15px;">Formas de Pago:</p>
            <ul>
                <li><strong>Sin factura:</strong> Solo pago en efectivo</li>
                <li><strong>Con factura:</strong> Cheques y transferencia</li>
            </ul>
        </div>
    </div>

    <!-- Espacio para pie de página (reservado para hoja pre-impresa) -->
    <div class="footer-space"></div>
</body>

</html>
