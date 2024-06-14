<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        
        <!-- Styles -->
        <style>
            
            body{
                background-size: cover;
                background-repeat: no-repeat;
                margin: 0;
                height: 100vh;
                background-image: url({{public_path('image/banquete.png')}});
                background-size: 100%;
                background-position: center center;
            }
            .informacion{
                margin-top: 50px;
                margin-left: 30px;
                margin-right: 20px;
            }
            .card-header{
                text-align: center;
                font-weight: 700;
                font-size: 20px;
                color: black;
                background-color: transparent;
            }
            .card-footer{
                margin-top: 50px;
            }
            label{
                padding-top: 20px;
                font-weight: 700;
            }

        </style>
        <title>Formato de banquete</title>

    </head>
<body>
<div class="informacion">
    <div class="card-header">
        Detalles del Banquete
    </div>
    <div class="card-body">
        <p>Apreciable <strong>{{$evento->cliente->nombre}}</strong>, me permito informarle que en base a la pasada reunion por motivo del banquete contratado para su evento el día {{ $fechaEvent->isoFormat('dddd D [de] MMMM [del] YYYY')}} se ha registrado la siguiente  información sobre el banquete:</p>
    </div>
    <div class="information">
        <label>Entrada:</label> {{$banquet->entry}}<br>
        <label>Plato fuerte:</label> {{$banquet->steak}}<br>
        <label>Salseo:</label> {{$banquet->sauce}}<br>
        <label>Guarnición:</label> {{$banquet->fitting}}<br>
        @if ($banquet->fitting2)
        <label>Guarnición 2:</label> {{$banquet->fitting2}}<br>
        @endif
        @if ($banquet->notes)
        <label>Notas:</label> {{$banquet->notes}}</p>
        @endif
    </div>
    <div  class="card-footer">
        Si existe un error en la información por favor de hacerlo saber, estamos a sus ordenes para cualquier duda o aclaración.
    </div>
</div>
</body>
</html>
