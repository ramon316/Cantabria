<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Styles -->
    <style>
        html {
            margin: 40pt;
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            background-image: url({{ public_path('./image/fondoCarta.jpeg') }});
            font-family: 'Helvetica', sans-serif;
        }

        .fondo {
            margin-top: 70px;
            margin-left: 2rem;
            margin-right: 2rem;
            text-align: justify;
        }

        .pagina {
            margin-top: 120px;
        }

        h3 {
            text-align: center;
        }

        p {
            text-align: justify;
            line-height: 40%;
        }
        .interlineado{
            line-height: 100%;
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
        .strong{
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 60px;
            font-size: 12px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px 4px;
            /* Aumentar el padding vertical */
            text-align: left;
            height: 25px;
            /* Establecer altura mínima para las celdas */
            vertical-align: middle;
            /* Centrar contenido verticalmente */
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            height: 30px;
            /* Mayor altura para los encabezados */
            padding: 10px 4px;
            /* Más padding para los encabezados */
        }

        /* Alternar colores de fondo para mejorar legibilidad */
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Garantizar que las celdas respeten la altura mínima */
        table tr {
            line-height: 25px;
        }
    </style>
</head>
<title>CONFIRMACIÓN DE MANTELERÍA DEL EVENTO</title>

<body>
    <div class="fondo">
        <div class="pagina">
            <div class="row">
                <p class="strong">CONFIRMACIÓN DE MANTELERÍA DEL EVENTO</p>
            </div>
            <div class="row">
                <p><strong>Folio: {{$evento->id}}</strong></p>
                <p> <strong>Fecha de Generación: {{$today}}</strong></p>

            </div>
            <div class="row">
                <h3>Información del cliente</h3>
                <p><strong>Cliente: {{ $evento->cliente->nombre }}</strong></p>
                <p><strong>Fecha del Evento: </strong>{{ $evento->start->format('d-m-Y') }}</p>
                <p><strong>Tipo de Evento: </strong>{{$evento->subtitle}}
                    @if ($evento->comment)
                    - {{$evento->comment}}
                    @endif</p>
                <p><strong>Teléfono: </strong>{{ $evento->cliente->telefono }}</p>
                <p><strong>Número de personas: </strong>{{ $evento->invitados }} personas</p>
            </div>
            <div class="row">
                <h2>Moviliario Reservado</h2>
                <h3>Mesas y Mantelería</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tipo mesa</th>
                            <th>Cantidad de mesas</th>
                            <th>Mantel</th>
                            <th>Tonalidad</th>
                            <th>Base</th>
                            <th>Tipo Silla</th>
                            <th>Color</th>
                            <th>Cantidad de sillas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->tabletype }}</td>
                            <td>{{ $record->amount }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->tonality }}</td>
                            <td>{{ $record->base_color }}</td>
                            <td>{{ $record->typechair }}</td>
                            <td>{{ $record->chair_color }}</td>
                            <td>{{ $record->chairs }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <p class="strong">Términos y condiciones</p>
                <p class="interlineado">Cualquier modificación en el pedido de mantelería y mobiliario deberá solicitarse por escrito con un mínimo de 30 días de anticipación a la fecha del evento.</p>
                <p class="interlineado">Las modificaciones estarán sujetas a disponibilidad.</p>
                <p class="interlineado">No se aceptarán cambios con menos de 30 días de anticipación a la fecha del evento.</p>
            </div>
</body>

</html>
