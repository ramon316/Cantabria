<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h3 {
            text-align: center;
            margin-top: 2 rem;
            margin-bottom: 2 rem;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20rem;
        }

        body {
            font-family: 'Tahoma';
        }


        .label-right {
            float: right;
        }

        .label-left {
            float: left;
        }
        .role{
            font-size: 11px;
            margin-left: 7rem;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo de pago</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h3>Recibo de pago</h3>

    <div class="">
            <label class="label-right">Chihuahua, Chih. {{$hoy}}</label>
            <br><br><br>
            <label class="label-left">Cantabria Salón de eventos confirma la recepción del pago realizado por el cliente en relación con el evento descrito a continuación:</label>
    </div>
    <div>
        <label>Cliente: {{$cliente}}</label><br>
        <label>Tipo de evento: {{$evento->subtitle}}</label><br>
        <label>Fecha del evento: {{$nowText}}</label><br>
        <label>Folio del contrato: {{$folio}}</label>
    </div>
    <br><br>
    <div>
        <label for="">El monto total de la transacción es el siguiente:</label>
    </div>
    <div>
        <label>Monto: $@dinero($monto) ({{$montoTexto}} 00/100 pesos m.n.)</label><br>
        <label>Tipo de pago: {{$tipo}}</label><br>
        <label for="">Saldo: $@dinero($pendiente) ({{$pendienteText}} 00/100 pesos m.n.)</label>
    </div>
    <div>
        <label for="">Recibido por: <strong>{{$user}}</strong> </label><br>
    <div class="role">{{ $role }}</div>
    <br><br><br>
    <div>
        Firma y Sello:
    </div>

</body>

</html>
