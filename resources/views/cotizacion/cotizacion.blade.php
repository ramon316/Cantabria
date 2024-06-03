<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <head>
        <meta charset="utf-8" />
        <!-- Styles -->
        <style>
        html{
            margin: 20pt;
        }
        body{
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            background-image: url({{public_path('./image/fondoCarta.jpeg')}});
        }
        .fondo{
            margin-top: 70px;
            margin-left: 2rem;
            margin-right: 2rem;
            text-align: justify;
        }
        .pagina{
            margin-top: 100px;
        }
        h3{
            text-align: center;
        }
        p{
            text-align: justify;
            line-height: 40%;
        }
        label, li{
            text-align:justify;
            line-height:90%;
            margin-top: 1rem;
        }
        .page-break {
            page-break-after: always;
        }
        hr{
            color: red;
        }
        </style>
    </head>
<title>Cotizacion</title>
<body>
<div class="fondo">
    <div class="pagina">
        <div class="row">
            <p><strong>Cliente:</strong>{{$cotizacion->cliente->nombre}}</p>
            <p><strong>Fecha del Evento:</strong>{{$cotizacion->start->format('d-m-Y')}}</p>
            <p><strong>Evento:</strong>{{$cotizacion->title}}</p>
            <p><strong>Teléfono:</strong>{{$cotizacion->cliente->telefono}}</p>
            <p><strong>Número de personas:</strong>{{$cotizacion->invitados}}</p>
             <p><strong>Fecha de Elaboración: </strong>{{date('d-m-Y')}}</p>
        </div>
    <hr>
        <div class="row">
            <label>Por este medio y en respuesta a su solicitud, le presento la propuesta para la realización de su evento. Esta cotización incluye:</label>            
        </div>
        <div class="row">
            @foreach ($servicios as $servicio)
                <ul>
                    <li>{{$servicio->nombre}}</li>
                </ul>
            @endforeach
        </div>

    <div class="row">
        <label><strong>Inversión $@dinero($costo) - {{$costoTexto}}</strong></label>
    </div>
    <div class="row">
        <label>Esta cotización tiene validez hasta el día {{date('d-m-Y',strtotime($cotizacion->validez))}}, después de esta fecha ya no tendrá validez y será necesario realizar otra cotización ya que los precios pueden cambiar.</label>
    </div>
</div>
</body>
</html>