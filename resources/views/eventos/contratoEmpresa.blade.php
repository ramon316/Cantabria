<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <!-- Styles -->
    <style>
        html {
                {
                    {
                    -- margin-top: 70px;
                    margin-left: 2rem;
                    margin-right: 2rem;
                    text-align: justify;
                    --
                }
            }
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            background-image: url({{public_path('image/fondoCarta.jpeg')}});

            {
                {
                -- background-size: 100%;
                background-position: center center;
                --
            }
        }
        }

        .fondo {}

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

        label,
        li {
            text-align: justify;
            line-height: 100%;
            margin-top: 0.5rem;
        }

        .page-break {
            page-break-before: always;
        }

        hr {
            color: black;
        }

        .centrado {
            margin-top: 1rem;
            margin-left: 5rem;
            margin-right: 5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .primeralinea {
            text-indent: 40px;
        }

        ul {
            list-style: square inside;
            margin-left: 3rem;
            padding: 0;
        }

        .sangria {
            margin-left: 5rem;
        }

        .espacio{
            margin-buttom: 5rem;
        }

        .flexbox-container {
            display: -ms-flex;
            display: -webkit-flex;
            display: flex;
            margin-top: 50px;
            text-align: center;
            margin-left: 200px;
            margin-right: 200px;
        }

        .flexbox-container>div {
                {
                    {
                    -- width: 80%;
                    --
                }
            }
        }
    </style>
    <title>Contrato</title>

</head>

<body>
    <div class="fondo">
        <div class="pagina">{{-- Pagina 1 --}}
            <div class="row">
                <label>En la ciudad de Chihuahua, estado de Chihuahua, a {{$fecha->fechaActual}}, comparece
                    <strong>CANTABRIA EVENTOS Y SERVICIOS S.A. DE C.V.</strong> por medio de su apoderado legal
                    <strong>C. YULIANA ELISA ANAYA ESTRADA</strong>, a quien en lo sucesivo se le designará por su
                    nombre o como <strong>"EL ARRENDADOR”</strong>, y por otra parte <strong>C.
                        {{Str::upper($evento->cliente->nombre)}}</strong>, a quien en lo sucesivo se le designará como
                    <strong>“ARRENDATARIO”</strong>, y manifiestan lo siguiente:</label>
            </div>
            <div class="row centrado">
                <label>QUE ES SU DESEO CELEBRAR UN CONTRATO DE ARRENDAMIENTO DE SALON DE EVENTOS Y LO SUJETAN AL TENOR
                    DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS</label>
            </div>
            <div class="row primeralinea">
                <p><strong>GLOSARIO:</strong> Para fines del presente Contrato, se entenderá por: </p>
            </div>
            <div class="row primeralinea">
                <label><strong>a) ARRENDADOR:</strong> Al propietario que ofrece el uso y disfrute del salón para
                    eventos sociales mediante el cobro de un precio cierto y determinado. </label>
            </div>
            <div class="row primeralinea">
                <label><strong>b) ARRENDATARIO:</strong>La persona física o moral que adquiere el derecho de usar el
                    salón para eventos sociales a cambio del pago de un precio cierto y determinado.</label>
            </div>
            <div class="row primeralinea">
                <label><strong>c) Salón de eventos denominado CANTABRIA EVENTOS.-</strong> El bien inmueble ubicado en
                    calle Sierra Magisterial esquina con calle Texas, colonia Los Nogales, en esta Ciudad de Chihuahua,
                    el cual es destinado a la celebración de eventos sociales, mismo que EL ARRENDADOR pone a
                    disposición del ARRENDATARIO.</label>
            </div>
            <div class="row primeralinea">
                <label><strong>d) El día del evento.-</strong>El día en que comienza el arrendamiento de las
                    instalaciones de CANTABRIA EVENTOS y de los servicios aquí descritos.</label>
            </div>
            <div class="row centrado">
                <label>DECLARACIONES.</label>
            </div>
            <div class="row">
                <label><strong>PRIMERA.- </strong>Manifiesta <strong>"EL ARRENDADOR"</strong></label>
            </div>
            <div class="row primeralinea">
                <label><strong>a) </strong>Que cuenta con todas las facultades necesarias para la celebración del
                    presente contrato de arrendamiento del salón de eventos denominado CANTABRIA EVENTOS el cual se
                    encuentra ubicado en Chihuahua, Chih. con oficinas de comercialización ubicadas en calle Sierra
                    Magisterial esquina con calle Texas, colonia Los Nogales de esta Ciudad de Chihuahua.</label>
            </div>
            <div class="row primeralinea">
                <label><strong>b) </strong>Su principal actividad es el arrendamiento de sus instalaciones que pueden
                    ser utilizadas para: todo tipo de eventos sociales, culturales, deportivos, entre otros.</label>
            </div>
            <div class="row primeralinea">
                <label><strong>c) </strong>Señala tener capacidad, habilidad, conocimientos, infraestructura y material
                    humano necesario para prestar dichos servicios en materia de este contrato.</label>
            </div>
            <div class="row">
                <label><strong>SEGUNDA.- </strong>Manifiesta <strong>"EL ARRENDATARIO"</strong></label>
            </div>
            <div class="row primeralinea">
                <label><strong>a) </strong>Ser mayor de edad y que cuenta con la capacidad y facultades suficientes para
                    obligarse en los términos de este contrato. </label>
            </div>
            <div class="row primeralinea">
                <label><strong>b) </strong>Tener nacionalidad Mexicana, con domicilio en {{$evento->cliente->calle}} no. {{$evento->cliente->numero}}, {{$evento->cliente->colonia}},
                    Chihuahua Chih.
                </label>
            </div>
            <div class="row primeralinea">
                <label><strong>c) </strong>Requerir los servicios que proporciona EL ARRENDADOR, los cuales son de su
                    pleno conocimiento, y que los mismos se describen más delante.</label>
            </div>
            <div class="row primeralinea">
                <label><strong>d) </strong>Tener conocimiento que EL ARRENDADOR cuenta con la capacidad tanto técnica
                    como humana para brindar el servicio aquí contratado.</label>
            </div>
        </div>
        <div class="page-break">
            <div class="pagina">{{-- Página 2 --}}
                <div class="row primeralinea">
                    <label>Que en virtud de los antecedentes aquí expuesto las partes comparecientes han convenido en
                        celebrar el presente contrato, el cual sujetan de conformidad a las siguientes</label>
                </div>
                <div class="row centrado">
                    <label>CLAUSULAS</label>
                </div>
                <div class="row primeralinea">
                    <label><strong>PRIMERA-</strong> El objeto de este contrato es la prestación de servicio de
                        arrendamiento de las instalaciones del Salón de eventos denominado CANTABRIA EVENTOS ubicado en
                        calle Sierra Magisterial esquina con calle Texas, colonia los Nogales, en esta Ciudad de
                        Chihuahua, para la organización de un evento social, con una capacidad máxima de
                        <strong>{{$evento->invitados}} {{$evento->invitadosLetra}}</strong>invitados, y una duración
                        máxima de <strong>{{$fechas->hours}} horas, el cual se llevará a cabo de las {{
                            $fechas->fechaInicio}} a las {{$fechas->fechaFin}}</strong></label>
                </div>
                <div class="row primeralinea">
                    <label><strong>SEGUNDA-</strong> El servicio de arrendamiento, incluye:</label>
                </div>
                <div>
                    <ul>
                        <li>Renta de Instalaciones en el horario indicado</li>
                        <li>Moviliario</li>
                        <li>Pista de baile</li>
                        <li>Escenario</li>
                        <li>Refresco y hielo ilimitado </li>
                        <li>Permiso de presidencia </li>
                        <li>Vaso de cristal </li>
                        <li>Mantelería de fina </li>
                        <li>Estacionamiento privado </li>
                        <li>Personal de seguridad </li>
                        <li>Personal de limpieza </li>
                        <li>Personal de Mantenimiento </li>
                        <li>Meseros </li>
                        <li>Barman </li>
                        <li>Capitán de meseros</li>
                        <li>Descorche</li>
                        <li>Suministro de bebidas a cargo del servicio de meseros (no brindamos el servicio de botella
                            en mesa)</li>
                        <li>Áreas de Fumadores </li>
                        <li>Coordinación Básica </li>
                    </ul>
                </div>
            </div>
            <div class="page-break">
                <div class="pagina">{{-- Página 3 --}}
                    {{-- Mostramos el servicio de decoración si es que existe --}}
                    <div class="row centrado">
                        @if($servicesExist->decor)
                        <label>PRODUCCIÓN FLORAL HÍDRICA:</label>
                        <ul>
                            <li>Centros de Mesa con base floral</li>
                            <li>Mesa Principal</li>
                            <li>Recibidor </li>
                            <li>Lobby </li>
                            <li>Áreas de Fumar</li>
                            <li>Un Ramo formal </li>
                            <li>Un Ramo informal </li>
                            <li>Un Arreglo para el Automóvil</li>
                            <li>Tres Bouttonier</li>
                        </ul>
                        <small>(No incluye flor ni follaje extrafino)</small>
                    </div>
                    @endif
                    <div class="sangria">
                        <label>Los servicios que fueron incluidos son los siguientes:</label><br>
                        @foreach ($servicios as $servicio)
                        @if($servicio->pivot->regalo === 0)
                        {{$servicio->nombre}}<br>
                        @endif
                        @endforeach
                        @foreach ($servicios as $servicio)
                        @if($servicio->pivot->regalo === 1)
                        {{$servicio->nombre}}<br> - Servicios de regalo
                        @endif
                        @endforeach
                        <br>
                    </div>
                        <div class="row primeralinea">
                            <label><strong>TERCERA.-</strong> El precio del arrendamiento es por la cantidad de
                                <strong>$@dinero($valores->costo) ({{$valores->costoTexto}} 00/100)</strong>, más
                                impuesto del valor agregado en caso de requerir factura. </label>
                        </div>
                        <div class="row primeralinea">
                            <label><strong>CUARTA.-</strong> La forma de pago de la cantidad señalada en la
                                cláusula que antecede es de la siguiente manera: </label>
                        </div>
                        <div class="row sangria">
                            <label>a) <strong>$@dinero($valores->costoAnticipo) ({{$valores->costoAnticipoTexto}}
                                    00/100)</strong> al momento de la firma del presente contrato, fungiendo el
                                mismo como el más amplio recibo que en derecho proceda. </label>
                        </div>
                        <div class="row sangria">
                            <label>b) A más tardar el día <strong>{{$fecha->fecha1mes}}</strong> deberá quedar
                                liquidado el 100% (cien por ciento) del precio establecido en la cláusula
                                tercera. </label>
                        </div>
                        <div class="row primeralinea">
                            <label><strong>QUINTA.-</strong> En caso de que EL ARRENDATARIO no realice los pagos
                                en las fechas y montos establecido en la cláusula cuarta, ambas partes son
                                conformes en que establezca una penalidad a cargo del ARRENDATARIO consistente
                                en un pago en favor de EL ARRENDADOR por la cantidad de $300.00 (trescientos
                                pesos 00/100 m.n.) por cada día natural de retraso en el pago estipulado en
                                dicha cláusula, así mismo, si dicho retraso es por más de diez días naturales,
                                la ARRENDADOR tendrá la facultad de dar por rescindido anticipadamente el
                                presente contrato, para lo cual la cantidad que haya sido cubierto por parte del
                                ARRENDATARIO será destinado al pago como penalidad en favor de EL ARRENDADOR sin
                                responsabilidad alguna por parte de este último de regresar dicho importe.
                            </label>
                        </div>
                        <div class="row primeralinea">
                            <label><strong>SEXTA.-</strong> Si el ARRENDATARIO desea aumentar el número de
                                personas asistentes al evento, podrá solicitarlo a más tardar el día
                                <strong>{{$fecha->fecha5diasantes}}</strong> con un costo adicional, para la cuál
                                tambien se le agregará el costo adicional de la decoración floral para cada
                                mesa, los cuales se cotizarán al momento de realizar la solicitud de aumento de
                                invitados. No se agregará mesa adicional sin decoración floral. Bajo ninguna
                                circunstancia se podrá realizar aumento de número de asistentes el día del
                                evento.</label>
                        </div>
                    </div>
                </div>
                <div class="page-break">
                    <div class="pagina">
                        <div class="row primeralinea">
                            <label><strong>SEPTIMA.-</STRONG>Si el ARRENDATARIO desea aumentar el número de horas
                                contratadas para el evento, podrá solicitarlo a más tardar el día
                                <strong>{{$fecha->fecha15diasantes}}</strong>, con un costo adicional el cuál se
                                cotizará al momento de su solicitud.</label>
                        </div>
                        <div class="row primeralinea">
                            <label><strong>OCTAVA.-</strong> En caso de que el ARRENDATARIO contrate servicios
                                adicionales a los descritos en la cláusula segunda, se anexarán en un adendum las
                                descripciones, cotizaciones, costos etc. Fungiendo el mismo como parte integrante del
                                presente instrumento.</label>
                        </div>
                        <div class="row primeralinea">
                            <label><strong>NOVENA.-</strong> En ningún caso El ARRENDATARIO puede cambiar la fecha del
                                evento previamente contratado.</label>
                        </div>

                            <div class="row primeralinea">
                                <label><strong>DECIMA.-</STRONG>.- En el supuesto de que el ARRENDATARIO desee cancelar
                                    el presente contrato, deberá pagar una penalización consistente en el 80% (ochenta
                                    por ciento) del precio establecido en la cláusula tercera, así como del 80% (ochenta
                                    por ciento) de la cantidad establecida como costo total por servicios adicionales
                                    establecidos en el adendum (en caso de que hubiesen sido contratados).</label>
                            </div>
                            <div class="row primeralinea">
                                <label><strong>DECIMA PRIMERA.-</strong>El ARRENDATARIO se obliga a dejar un depósito de
                                    $5,000.00 (cinco mil pesos 00/100 m.n.) a más tardar el día
                                    <strong>{{$fecha->fecha1diaantes}}</strong>, en calidad de garantía por los posibles
                                    daños causados a las instalaciones de CANTABRIA EVENTOS, ya sea por el mismo
                                    ARRENDATARIO, algun proveedor o invitado. En el supuesto de que no se genere ningún
                                    daño o el mismo sea inferior a la cantidad otorgada en concepto de depósito, el
                                    depósito o cantidad restante será devuelto a más tardar cinco días hábiles
                                    posteriores al evento, en el supuesto de que los daños superen la cantidad entregada
                                    como depósito, El ARRENDATARIO se compromete a pagar la cantidad restante a más
                                    tardar 7 días hábiles a partir del evento, por lo cual desde ese momento el
                                    ARRENDATARIO se compromete a cubrir los daños y/o perjuicios ocasionados a la
                                    infraestructura, mobiliario, cristalería, mantelería y decoración interior y
                                    exterior e iluminación, cometido por sus invitados y/o proveedores. No se podrá dar
                                    inicio al evento en caso de que el ARRENDATARIO no deje el déposito
                                    mencionado.</label>
                            </div>
                            <div class="row primeralinea">
                                <label><strong>DECIMA SEGUNDA.-</strong> El ARRENDATARIO tendrá acceso 60 (sesenta)
                                    minutos antes del inicio del evento para que reciba las condiciones del inmueble y
                                    realice los preparativos necesarios. En caso de no asignar alguna persona, se dará
                                    por enterado de las buenas condiciones del inmueble. El acceso de los invitados a
                                    las instalaciones será 20 (veinte) minutos antes de la hora establecida en la
                                    clausula primera de este contrato. Por ningun motivo se les dará acceso antes de la
                                    hora establecida.</label>
                            </div>

                            <div class="row primeralinea">
                                <label><strong>DECIMA TERCERA.-</strong> Si por causas de fuerza mayor y/o por motivo de
                                    fenómenos meteorológicos y/o por causas ajenas a la voluntad de EL ARRENDADOR, ésta
                                    última se encuentra imposibilitada en cumplir con lo establecido en el presente
                                    contrato, EL ARRENDADOR se compromete a re agendar la fecha del evento de acuerdo a
                                    la disponibilidad de la agenda de CANTABRIA EVENTOS, o conseguir un espacio en
                                    diverso lugar para llevar a cabo el evento, lo cual será decisión exclusiva de EL
                                    ARRENDADOR, manifestando que en ningún caso procede el reembolso del importe pagado
                                    en favor del ARRENDATARIO.</label>
                            </div>
                        <div class="page-break">
                            <div class="pagina">{{-- Página 5 --}}
                                <div class="row primeralinea">
                                    <label><strong>DECIMA CUARTA.-</strong> La recepción de bebidas alcohólicas para el
                                        evento será un día hábil antes del evento, únicamente en un horario de 9:00 a
                                        16:00 horas. La entrega de las bebidas alcohólicas sobrantes se realizará al
                                        siguiente día hábil en el mismo horario. El ARRENDATARIO se compromete a
                                        recogerlas máximo 5 días hábiles después del evento, de lo contrario pierde su
                                        derecho a recoger dichas bebidas.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>DECIMA QUINTA.-</strong> Para la entrada de cualquier tipo de
                                        mobiliario, equipo, decoración, etc. contratada por el ARRENDATARIO a las
                                        instalaciones arrendadas, el proveedor deberá contactar a EL ARRENDADOR con
                                        mínimo 7 días hábiles para avisar de su llegada. El cual debe respetar un
                                        horario de 9:00 a 13:00 horas. </label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>DECIMA SEXTA.-</strong> EL ARRENDADOR no resguardará cualquier tipo
                                        de mobiliario, equipo, decoración, accesorios, etc. ni se hará responsable de
                                        alguna pérdida o daño.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>DECIMA SÉPTIMA.-</strong> EL ARRENDADOR no brindará un espacio en las
                                        instalaciones arrendadas para que el proveedor realice un trabajo previo al
                                        evento.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>DECIMA OCTAVA.-</strong>El ARRENDATARIO podrá hacer uso de las
                                        instalaciones arrendadas solo el día del evento, se podrán hacer las pruebas de
                                        montaje, ensayos, etc. que se requieran unos días antes del evento únicamente a
                                        disponibilidad de EL ARRENDADOR y bajo la responsabilidad del ARRENDATARIO con
                                        un costo extra, el cuál se cotizará en el momento de la solicitud. Al término de
                                        dicha prueba o montaje, las instalaciones regresaran a su montaje anterior.
                                    </label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>DECIMA NOVENA.-</strong> Las pruebas de mantelería y elección de
                                        mobiliario son asignadas una vez al mes de lunes a miercóles y según la
                                        disponibilidad de EL ARRENDADOR.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>VIGÉSIMA.-</strong> EL ARRENDADOR utilizará como refresco la marca de
                                        la familia Coca-Cola en sabores Fresca, Coca-Cola Regular y Agua Mineral. Si el
                                        ARENDATARIO deseara otros sabores o bebidas diferentes, la tendrá que
                                        suministrar el mismo, sin que ello dé lugar a un descuento en el precio
                                        establecido.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>VIGÉSIMA PRIMERA.-</strong> EL ARRENDADOR por conducto de quien ella
                                        tenga a bien designar se reserva el derecho de admisión a personas con indicios
                                        de intoxicación, armas de fuego, objetos punzocortantes, explosivos o todo
                                        aquello que EL ARRENDADOR considere peligroso para los invitados en el evento.
                                        El ARRENDATARIO acepta la restricción de acceso a personas (invitados y
                                        proveedores) que se presenten según los casos descritos en ésta claúsula.
                                    </label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>VIGÉSIMA SEGUNDA.-</strong> El ARRENDATARIO acepta que no se servirá
                                        bebidas alcohólicas a menores de edad y/o proveedores. En dado caso de
                                        sorprender a alguien drogándose, o a algún menor de edad tomando bebidas
                                        embriagantes estos serán puestos a disposición de las autoridades
                                        competentes.</label>
                                </div>
                                <div class="row primeralinea">
                                    <label><strong>VIGÉSIMA TERCERA.-</strong> Será responsabilidad del ARRENDATARIO
                                        llevar un control el número de asistentes al evento, por lo que en el supuesto
                                        de que el número de invitados contratados se encuentre cubierto y aun estén
                                        pendiente de ingresar más asistentes, el ARRENDATARIO deslinda de toda
                                        responsabilidad a EL ARRENDADOR, sin que dé lugar a ampliar el número de
                                        asistentes, aclarando que niños a partir de los dos años o que ocupen un espacio
                                        cuenta como invitado. </label>
                                </div>
                            </div>
                            <div class="page-break">
                                <div class="pagina">{{-- Página 6 --}}
                                    <div class="row primeralinea">
                                        <label><strong>VIGÉSIMA CUARTA.-</strong> El ARRENDATARIO acepta y reconoce que
                                            no podrá ingresar a las instalaciones arrendadas arreglos florales, mesa de
                                            dulces, barras de postre, barras de bebidas, así como cualquier tipo de
                                            alimento salvo autorización expresa por EL ARRENDADOR.</label>
                                    </div>
                                    <div class="row primeralinea">
                                        <label><strong>VIGÉSIMA QUINTA.-</strong> Para el entendimiento e interpretación
                                            del presente ambas partes se sujetan a lo establecido exclusivamente en el
                                            presente instrumento y en su caso en el adendum respectivo, por lo que
                                            cualquier convenio o disposición no establecida por escrito en el presente
                                            contrato no será válida.</label>
                                    </div>
                                    <div class="row primeralinea">
                                        <label><strong>VIGÉSIMA SEXTA.-</strong> SPara todo lo relativo a la
                                            interpretación y cumplimiento del presente instrumento (incluyendo los
                                            formatos derivados del mismo), en este acto las partes se someten de manera
                                            expresa e irrevocable, a las leyes aplicables de esta Ciudad de Chihuahua y
                                            a la jurisdicción de los tribunales competentes de Chihuahua, Chih., y
                                            renuncian de manera expresa e irrevocable, a cualquier jurisdicción que
                                            pudiere corresponderles en virtud de sus domicilios presentes y futuros, la
                                            ubicación de sus bienes o por cualquier otra razón.</label>
                                    </div>
                                    <div class="flexbox-container">
                                        <div>
                                            <hr>
                                            ARRENDADOR<br>
                                            Cantabria Eventos y Servicios S.A. De C.V.<BR>
                                            <strong>Apoderado Legal C. YULIANA ELISA ANAYA ESTRADA</strong><br>
                                        </div>
                                        <div class="pagina">
                                            <HR>
                                            ARRENDATARIO<br>
                                            <strong>{{Str::upper($evento->cliente->nombre)}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>

</html>
