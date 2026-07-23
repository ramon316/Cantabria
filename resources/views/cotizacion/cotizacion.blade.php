<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Cotizacion</title>
    <!-- Styles -->
    <style>
        @page {
            margin: 40pt 30pt;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .header-table td {
            padding: 0;
            vertical-align: middle;
        }

        .header-table img {
            max-width: 150px;
        }

        .header-table h3 {
            font-size: 20px;
            margin: 0;
            color: #000;
            text-align: left;
        }
        
        .header-table h1 {
            font-size: 24px;
            margin: 0;
            color: #000;
            text-align: right;
        }

        .customer-details p {
            margin: 0 0 4px 0;
            line-height: 1.4;
        }

        p,
        label,
        li {
            line-height: 1.5;
        }

        ul {
            margin-top: 5px;
            margin-bottom: 15px;
            padding-left: 20px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .page-break-before {
            page-break-before: always;
        }

        .services-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .services-table th,
        .services-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .services-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }

        .total-section {
            margin-top: 20px;
            width: 50%;
            margin-left: 50%;
        }
        
        .total-section table{
            width: 100%;
        }

        .total-section td {
            padding: 6px 8px;
            font-size: 13px;
        }
        .total-section .total {
            font-weight: bold;
            font-size: 14px;
            border-top: 2px solid #333;
        }

        .terms-section {
            margin-top: 30px;
        }

        .attended-by {
            margin-top: 40px;
        }

        .attended-by p {
            margin: 0;
            line-height: 1.4;
        }
    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td>
                {{-- Si tienes un logo, puedes ponerlo aquí. Ejemplo: --}}
                {{-- <img src="{{ public_path('./image/logo.png') }}" alt="logo"> --}}
                <h3>Cantabria Salón de Eventos</h3>
            </td>
            <td>
                <h1>Cotización</h1>
            </td>
        </tr>
    </table>

    <div class="customer-details">
        <p><strong>Cliente:</strong> {{ $cotizacion->cliente->nombre }}</p>
        <p><strong>Fecha del Evento:</strong> {{ $eventDay }}</p>
        <p><strong>Tipo de Evento:</strong> {{$cotizacion->subtitle}} - {{$cotizacion->comment}}</p>
        <p><strong>Teléfono:</strong> {{ $cotizacion->cliente->telefono }}</p>
        <p><strong>Número de personas:</strong> {{ $cotizacion->invitados }} personas</p>
        <p><strong>Fecha de Cotización:</strong> {{ $today }}</p>
    </div>

    <hr>

    <div>
        <label>Por este medio y en respuesta a su solicitud, le presento la propuesta para la realización de su evento. Esta cotización incluye:</label>
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
        @if ($ExistDecoracion != null)
            <label>PRODUCCIÓN FLORAL HÍBRIDA:</label>
            <ul>
                <li>Centros de Mesa de flor artificial y centros de mesa de flor natural (NO INCLUYE FLOR NI FOLLAJE EXTRA FINO)</li>
            </ul>
            <p class="text-center">Cotización válida únicamente para <strong>{{ $cotizacion->invitados }}</strong> invitados, sujeto a disponibilidad.</p>
        @endif
    </div>

    <div class="page-break-before"></div>
    
    <table class="services-table">
        <thead>
            <tr>
                <th>Descripción</th>
                <th class="text-right">Costo</th>
            </tr>
        </thead>
        <tbody>
            @if($costoRentaDecoracion > 0)
            <tr>
                <td>Renta y decoración</td>
                <td class="text-right">$@dinero($costoRentaDecoracion)</td>
            </tr>
            @endif
            @if ($servicios->isnotempty())
                <tr>
                    <td colspan="2"><strong>Servicios Adicionales:</strong></td>
                </tr>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->pivot->cantidad > 1 ? $servicio->pivot->cantidad : '' }} {{ $servicio->nombre }}</td>
                        <td class="text-right">$@dinero($servicio->pivot->costo * $servicio->pivot->cantidad)</td>
                    </tr>
                @endforeach
            @endif
            @if ($servicesCortesy->isnotempty())
                <tr>
                    <td colspan="2"><strong>Servicios de Cortesía:</strong></td>
                </tr>
                @foreach ($servicesCortesy as $service)
                    <tr>
                        <td>{{ $service->pivot->cantidad > 1 ? $service->pivot->cantidad : '' }} {{ $service->nombre }}</td>
                        <td class="text-right">Sin costo</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="total-section">
        <table>
            <tr>
                <td>Subtotal:</td>
                <td class="text-right">$@dinero($costoSinDescuento)</td>
            </tr>
            @if ($descuento > 0)
            <tr>
                <td>Descuento:</td>
                <td class="text-right">-$@dinero($descuento)</td>
            </tr>
            @endif
            <tr class="total">
                <td>Inversión Total:</td>
                <td class="text-right">$@dinero($costo)</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right">({{ $costoTexto }} 00/100 m.n.)</td>
            </tr>
        </table>
    </div>

    <div class="terms-section">
        <label>Términos y condiciones</label>
        <ul>
            <li>Anticipo de $15,000.00 (QUINCE MIL PESOS 00/100 m.n.)</li>
            <li>Cotización vigente al {{$end}}. Sujeto a disponibilidad.</li>
            <li>Alimentos y decoración exclusivo de Cantabria Salón de Eventos (no se permiten proveedores externos)</li>
        </ul>
        <label>Formas de pago:</label>
        <ul>
            <li>Sin factura: Solo pago en efectivo</li>
            <li>Con factura: Cheques y transferencia</li>
        </ul>
    </div>

    <div class="attended-by">
        <p><strong>Atendido por:</strong></p>
        <p>{{ $usuario['nombre'] }} - {{ $usuario['rol'] }}</p>
        <p>{{ $usuario['email'] }}</p>
        <p>{{ $usuario['telefono'] }}</p>
    </div>
</body>

</html>
