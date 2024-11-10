<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h1 {
            text-align: center;
            margin-top: 0%;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20rem;

        }
        div{
            margin-top: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo de pago</title>
</head>

<body>
    <img src="image/logo.jpeg" alt="">
    <h1>Recibo de pago</h1>
    <div>
        <label for="">Por la presente, se confirma la recepción del pago realizado por el cliente en relación con el
            evento descrito a continuación:</label>
    </div>
    <div>
        <label>Cliente: {{$cliente}}</label><br>
        <label>Tipo de evento: {{$evento->subtitle}}</label><br>
        <label>Fecha del evento: {{$nowText}}</label>
    </div>
    <div>
        <label for="">El monto total de la transacción es el siguiente:</label>
    </div>
    <div>
        <label>Monto: $@dinero($monto) ({{$montoTexto}} 00/100) pesos.</label><br>
        <label for="">Por pagar: $@dinero($pendiente) ({{$pendienteText}} 00/100) pesos.</label>
    </div>
    <div>
        <label for="">Cobrado por: <strong>{{$user}}</strong></label>
    </div>
    <div>
        Firma y Sello:
    </div>

</body>

</html>
