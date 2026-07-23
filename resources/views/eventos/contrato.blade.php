<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contrato Folio: {{ $evento->folioFormateado }}</title>
    <!-- Styles -->
    <style>
        @page {
            margin: 40pt 30pt;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
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

        .header-table h3 {
            font-size: 18px;
            margin: 0;
            color: #000;
            text-align: left;
        }
        
        .header-table h1 {
            font-size: 20px;
            margin: 0;
            color: #000;
            text-align: right;
        }

        .folio-label {
            font-size: 11px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 15px;
        }

        p, label, li {
            line-height: 1.5;
            text-align: justify;
            display: block;
        }

        ul {
            margin-top: 5px;
            margin-bottom: 15px;
            padding-left: 20px;
            list-style: square inside;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .page-break-before {
            page-break-before: always;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        /* Contract specific */
        .pagina {
            margin-top: 50px;
        }

        .primeralinea {
            text-indent: 40px;
        }

        .sangria {
            margin-left: 3rem;
        }

        .centrado {
            margin-top: 1rem;
            margin-left: 2rem;
            margin-right: 2rem;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: bold;
        }

        .espacio{
            margin-bottom: 1.5rem;
        }

        .flexbox-container {
            display: table;
            width: 100%;
            margin-top: 50px;
        }

        .flexbox-container > div {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 0 20px;
        }

        .arrendatario-box {
            padding-top: 90px;
        }

        .clause-item {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Página 1 -->
    <div class="pagina">
        <div class="folio-label">
           <p class="text-left">Contrato de arrendamiento con número de folio: {{ $evento->folioFormateado }}</p>
        </div>
        <div class="row">
            <p class="primeralinea">
                En la ciudad de Chihuahua, estado de Chihuahua, al día <strong>{{ $fecha->fechaActualMayusc }}</strong> comparece 
                <strong>CANTABRIA EVENTOS Y SERVICIOS S.A. DE C.V.</strong> por medio de su APODERADO LEGAL la 
                <strong>C. YULIANA ELISA ANAYA ESTRADA</strong>, a quien en lo sucesivo se le designará por su nombre o como 
                <strong>“EL ARRENDADOR”</strong>, y por otra parte el <strong>C. {{ Str::upper($evento->cliente->nombre) }}</strong>, 
                a quien en lo sucesivo se le designará como <strong>“EL ARRENDATARIO”</strong>, y manifiestan lo siguiente:
            </p>
        </div>
        
        <div class="row centrado">
            <p class="text-center">QUE ES SU DESEO CELEBRAR UN CONTRATO DE ARRENDAMIENTO DE SALON DE EVENTOS Y LO SUJETAN AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS.</p>
        </div>
        
        <div class="row">
            <p><strong>GLOSARIO:</strong> Para fines del presente Contrato, se entenderá por:</p>
            <p class="primeralinea">
                <strong>a) ARRENDADOR.-</strong> La persona moral por medio de su APODERADO LEGAL que ofrece el uso y disfrute del salón para eventos sociales mediante el cobro de un precio cierto y determinado.
            </p>
            <p class="primeralinea">
                <strong>b) ARRENDATARIO.-</strong> La persona física o moral que adquiere el derecho de usar el salón para eventos sociales a cambio del pago de un precio cierto y determinado.
            </p>
            <p class="primeralinea">
                <strong>c) Salón de eventos denominado CANTABRIA EVENTOS.-</strong> El bien inmueble ubicado en calle Sierra Magistral S/N esquina con calle Texas, colonia Los Nogales, en esta Ciudad de Chihuahua, el cual es destinado a la celebración de eventos sociales, mismo que EL ARRENDADOR pone a disposición del ARRENDATARIO.
            </p>
            <p class="primeralinea">
                <strong>d) El día del evento.-</strong> El día en que comienza el arrendamiento de las instalaciones de CANTABRIA EVENTOS y de los servicios aquí descritos.
            </p>
        </div>

        <div class="row centrado">
            <p class="text-center"  ><strong>DECLARACIONES</strong></p>
        </div>

        <div class="row">
            <p><strong>PRIMERA.- Manifiesta “EL ARRENDADOR”:</strong></p>
            <p class="primeralinea">
                <strong>a)</strong> Que cuenta con todas las facultades necesarias para la celebración del presente contrato de arrendamiento del salón de eventos denominado CANTABRIA EVENTOS el cual se encuentra ubicado en Chihuahua, Chih. con oficinas de comercialización ubicadas en calle Sierra Magistral esquina con calle Texas, colonia Los Nogales de esta Ciudad de Chihuahua.
            </p>
            <p class="primeralinea">
                <strong>b)</strong> Su principal actividad es el arrendamiento de sus instalaciones que pueden ser utilizadas para: todo tipo de eventos sociales, culturales, deportivos, entre otros.
            </p>
            <p class="primeralinea">
                <strong>c)</strong> Señala tener capacidad, habilidad, conocimientos, infraestructura y material humano necesario para prestar dichos servicios en materia de este contrato.
            </p>
        </div>

        <div class="row">
            <p><strong>SEGUNDA.- Manifiesta “EL ARRENDATARIO”:</strong></p>
            <p class="primeralinea">
                <strong>a)</strong> Ser mayor de edad y que cuenta con la capacidad y facultades suficientes para obligarse en los términos de este contrato.
            </p>
            <p class="primeralinea">
                <strong>b)</strong> Tener nacionalidad Mexicana, con domicilio en <strong>{{ STR::upper($evento->cliente->calle) }} {{ $evento->cliente->numero }}, {{ STR::upper($evento->cliente->colonia) }} {{ $evento->cliente->cp }}, CHIHUAHUA, CHIH.</strong>
            </p>
            <p class="primeralinea">
                <strong>c)</strong> Requerir los servicios que proporciona EL ARRENDADOR, los cuales son de su pleno conocimiento, y que los mismos se describen más delante.
            </p>
            <p class="primeralinea">
                <strong>d)</strong> Tener conocimiento que EL ARRENDADOR cuenta con la capacidad tanto técnica como humana para brindar el servicio aquí contratado. Que en virtud de los antecedentes aquí expuesto las partes comparecientes han convenido en celebrar el presente contrato, el cual sujetan de conformidad a las siguientes:
            </p>
        </div>

        <div class="row centrado">
            <p class="text-center">CLÁUSULAS</label>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>PRIMERA.-</strong> El objeto de este contrato es la prestación de servicio de arrendamiento de las instalaciones del Salón de eventos denominado CANTABRIA EVENTOS ubicado en calle Sierra Magistral esquina con calle Texas, colonia los Nogales, en esta Ciudad de Chihuahua, para la organización de un evento social, con una capacidad máxima de <strong>{{ $evento->invitados }} ({{ Str::upper($valores->invitadosLetra) }})</strong> personas, y una duración máxima de <strong>{{ $fechas->hours }} ({{ $fechas->hours == 5 ? 'cinco' : $fechas->hours }})</strong> horas, el cual se llevará a cabo de las <strong>{{ $fechas->fechaInicio }}</strong> a las <strong>{{ $fechas->fechaFin }}</strong>.
            </p>
        </div>
    </div>
    <div class="pagina">
        <div class="row clause-item">
            <p><strong>SEGUNDA.-</strong> El servicio de arrendamiento, incluye:</p>
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
                <li>Capitán de meseros</li>
                <li>Descorche libre</li>
                <li>Áreas de Fumadores</li>
                <li>Suministro de bebidas a cargo del servicio de meseros (no brindamos el servicio de botella en mesa)</li>
                <li>Coordinación Básica</li>
                <li>Una prueba de mantelería y sillas previa al evento</li>
            </ul>
        </div>
        {{-- Servicios adicionales de decoración floral (Condicional) --}}
        @if(!is_null($servicesExist->decor))
        <div class="row clause-item">
            <p><strong>PRODUCCIÓN FLORAL:</strong></p>
            <ul>
                <li>Centros de Mesa híbridos</li>
                <li>Centros de Mesa con flor y follaje natural</li>
                <li>Una prueba floral previa al evento</li>
            </ul>
            <p style="font-size: 9px; margin-top: -10px; margin-bottom: 15px; font-style: italic;">
                (Incluye decoración artificial y natural. No incluye follaje extrafino ni flor extrafina. Tonos de follaje, flor natural y artificial están sujetos a DISPONIBILIDAD y EXISTENCIA).
            </p>
        </div>
        @endif

        {{-- Servicios Adicionales en Sistema --}}
        @if ($servicios->where('pivot.regalo', 0)->isNotEmpty())
        <div class="row clause-item">
            <p><strong>SERVICIOS ADICIONALES:</strong></p>
            <ul>
                @foreach ($servicios as $servicio)
                    @if($servicio->pivot->regalo === 0)
                        <li>{{ $servicio->pivot->cantidad > 1 ? $servicio->pivot->cantidad . ' ' : '' }}{{ $servicio->nombre }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Servicios de Regalo (Cortesías) --}}
        @if ($servicios->where('pivot.regalo', 1)->isNotEmpty())
        <div class="row clause-item">
            <p><strong>SERVICIOS DE REGALO:</strong></p>
            <ul>
                @foreach ($servicios as $servicio)
                    @if($servicio->pivot->regalo === 1)
                        <li>{{ $servicio->pivot->cantidad > 1 ? $servicio->pivot->cantidad . ' ' : '' }}{{ $servicio->nombre }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row clause-item" style="margin-top: 15px;">
            <p class="primeralinea">
                <strong>TERCERA.-</strong> El precio total del arrendamiento es por la cantidad de <strong>$@dinero($valores->costo) (SON {{ Str::upper($valores->costoTexto) }} 00/100 M.N.)</strong> más el impuesto del valor agregado en caso de requerir factura.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>CUARTA.-</strong> La forma de pago de la cantidad señalada en la cláusula que antecede es de la siguiente manera:
            </p>
            <p class="sangria">
                <strong>a)</strong> <strong>$@dinero($valores->costoAnticipo) (SON {{ Str::upper($valores->costoAnticipoTexto) }} 00/100 M.N.)</strong> al momento de la firma del presente contrato, fungiendo el mismo como el más amplio recibo que en derecho proceda.
            </p>
            <p class="sangria">
                <strong>b)</strong> Deberá quedar liquidada la cantidad de $20,000.00 (Son veinte mil pesos 00/100 m.n.) a más tardar el día <strong>{{ $fecha->fecha3mesesDespues }}</strong>.
            </p>
            <p class="sangria">
                <strong>c)</strong> A más tardar el día <strong>{{ $fecha->fecha3meses }}</strong> deberá quedar liquidado el 50% (cincuenta por ciento) del precio establecido en la cláusula tercera.
            </p>
            <p class="sangria">
                <strong>d)</strong> A más tardar el día <strong>{{ $fecha->fecha1mes }}</strong> deberá quedar liquidado el 100% (cien por ciento) del precio establecido en la cláusula tercera.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>QUINTA.-</strong> En caso de que EL ARRENDATARIO no realice cualquiera de los pagos en las fechas y montos establecidos en la cláusula cuarta, incurrirá en mora de pleno derecho, sin necesidad de requerimiento previo, obligándose a pagar a favor de EL ARRENDADOR una penalidad diaria por mora equivalente a $300.00 (trescientos pesos 00/100 M.N.) por cada día natural de retraso; y si el retraso en el cumplimiento de pago excede de 10 (diez) días naturales, el presente contrato se tendrá por rescindido de pleno derecho y de manera automática, sin necesidad de declaración judicial.
            </p>
            <p>En tal supuesto:</p>
            <p class="sangria">1. Se hará exigible de inmediato el total de las cantidades pendientes de pago (vencimiento anticipado);</p>
            <p class="sangria">2. EL ARRENDATARIO perderá en favor de EL ARRENDADOR todas las cantidades que haya entregado hasta ese momento, las cuales se aplicarán como pena convencional;</p>
            <p class="sangria">3. EL ARRENDATARIO deberá cubrir cualquier saldo insoluto, junto con intereses moratorios, penalidades y demás accesorios legales;</p>
            <p class="sangria">4. EL ARRENDADOR quedará liberado de cualquier obligación de prestación del servicio, pudiendo disponer libremente de la fecha contratada.</p>
            <p class="primeralinea">
                Las partes acuerdan expresamente que todas las penalizaciones establecidas en el presente contrato incluyendo, pero no limitándose a aquellas derivadas de cancelación, cambio de fecha, incumplimiento de pagos, modificación de condiciones o cualquier otro supuesto previsto en el mismo, constituyen una pena convencional en términos de la legislación civil aplicable.
            </p>
            <p class="primeralinea">
                Dichas penalizaciones han sido libremente pactadas por las partes, reconociendo el ARRENDATARIO que las mismas son razonables, proporcionales y acordes a los daños y perjuicios que su incumplimiento ocasionaría al ARRENDADOR, incluyendo de manera enunciativa mas no limitativa:
            </p>
            <p class="sangria">• La pérdida de oportunidad comercial por la reserva exclusiva de la fecha;</p>
            <p class="sangria">• La imposibilidad de contratar con terceros en el mismo periodo;</p>
            <p class="sangria">• Los costos administrativos, operativos y logísticos previos al evento;</p>
            <p class="sangria">• La planeación, coordinación y apartamiento de recursos humanos y materiales;</p>
            <p class="sangria">• La afectación directa a la agenda y programación del ARRENDADOR.</p>
            <p class="primeralinea">
                En consecuencia, las partes acuerdan que la pena convencional pactada será exigible sin necesidad de acreditar daños o perjuicios adicionales, ni requerirá declaración judicial previa para su procedencia, asimismo, el ARRENDATARIO renuncia expresamente a solicitar la reducción de la pena convencional, reconociendo que su monto ha sido determinado de manera libre, informada y sin vicio en el consentimiento, por lo que no podrá alegar desproporción, lesión, error, dolo o cualquier otra causa tendiente a disminuirla o invalidarla.
            </p>
            <p class="primeralinea">
                El pago de la pena convencional no libera al ARRENDATARIO del cumplimiento de las demás obligaciones asumidas en el presente contrato, cuando así resulte procedente conforme a su naturaleza.
            </p>
        </div>
        <div class="row clause-item">
            <p class="primeralinea">
                <strong>SEXTA.-</strong> Si el ARRENDATARIO desea aumentar el número de personas asistentes al evento, podrá solicitarlo a más tardar el día <strong>{{ $fecha->fecha1diaantes }}</strong> con un costo adicional, para la cuál tambien se le agregará el costo adicional de la decoración floral para cada mesa, los cuales se cotizarán al momento de realizar la solicitud de aumento de invitados. No se agregará mesa adicional sin decoración floral. Bajo ninguna circunstancia se podrá realizar aumento de número de asistentes el día del evento ni agregar mesas adicionales.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>SÉPTIMA.-</strong> Si el ARRENDATARIO desea aumentar el número de horas contratadas para el evento, podrá solicitarlo a más tardar el día <strong>{{ $fecha->fecha15diasantes }}</strong>, con un costo adicional el cuál se cotizará al momento de su solicitud.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>OCTAVA.-</strong> En caso de que el ARRENDATARIO contrate servicios adicionales a los descritos en la cláusula segunda, se anexarán en un adendum las descripciones, cotizaciones, costos etc. Fungiendo el mismo como parte integrante del presente instrumento.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>NOVENA.-</strong> El ARRENDATARIO podrá cambiar la fecha de su evento a mas tardar el <strong>{{ $fecha->fecha6meses }}</strong> para lo cual, deberá quedar liquidado el 100% (cien por ciento) de su evento descrito en la cláusula tercera, así como pagar una penalización consistente en el 30%(treinta por ciento) del precio establecido en la cláusula tercera, el 30%(treinta por ciento) de la cantidad establecida como costo total por servicios adicionales establecidos en el adendum (en caso de que hubiesen sido contratados) y el costo del incremento correspondiente al ajuste de precios que se tenga establecido en el momento de la solicitud; EL ARRENDADOR realizará la recalendarización del evento de acuerdo a las fechas disponibles en CANTABRIA EVENTOS y servicios adicionales mencionados en este contrato y/o ademdums y el ARRENDATARIO deberá firmar un nuevo contrato de ARRENDAMIENTO para el cambio de fecha con los ajustes de precios y realizar los pagos descritos anteriormente en las instalaciones de CANTABRIA EVENTOS. En ningún caso se puede cambiar la fecha del evento previamente contratado sin el pago del 100% (cien por ciento) del presente contrato, la realización del pago de las penalizaciones descritas y la firma del nuevo contrato de ARRENDAMIENTO con los ajustes de precios.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA.-</strong> El ARRENDATARIO podrá cambiar la fecha de su evento después del <strong>{{ $fecha->fecha6meses }}</strong> y hasta el <strong>{{ $fecha->fecha3meses }}</strong> para lo cual deberá quedar liquidado el 100% (cien por ciento) de su evento descrito en la cláusula tercera, así como pagar una penalización consistente en el 50%(cincuenta por ciento) del precio establecido en la cláusula tercera, el 50%(cincuenta por ciento) de la cantidad establecida como costo total por servicios adicionales establecidos en el adendum (en caso de que hubiesen sido contratados) y el costo del incremento correspondiente al ajuste de precios que se tenga establecido en el momento de la solicitud; EL ARRENDADOR realizará la recalendarización del evento de acuerdo a las fechas disponibles en CANTABRIA EVENTOS y servicios adicionales mencionados en este contrato y/o ademdums y el ARRENDATARIO deberá firmar un nuevo contrato de ARRENDAMIENTO para el cambio de fecha con los ajustes de precios y realizar los pagos descritos anteriormente en las instalaciones de CANTABRIA EVENTOS. Para realizar el cambio de fecha del evento previamente contratado deberá quedar liquidado el 100% (cien por ciento) del presente contrato, la realización del pago de las penalizaciones descritas y la firma del nuevo contrato de ARRENDAMIENTO con los ajustes de precios. En ningún caso se podrá cambiar la fecha del evento después del <strong>{{ $fecha->fecha3meses }}</strong>.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA PRIMERA.-</strong> En el supuesto de que el ARRENDATARIO desee cancelar el presente contrato antes del <strong>{{ $fecha->fecha6meses }}</strong>, deberá pagar una penalización consistente en el 80% (ochenta por ciento) del precio establecido en la cláusula tercera, así como del 80% (ochenta por ciento) de la cantidad establecida como costo total por servicios adicionales establecidos en el adendum (en caso de que hubiesen sido contratados).
            </p>
        </div>
        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA SEGUNDA.-</strong> En el supuesto de que el ARRENDATARIO desee cancelar el presente contrato despues del <strong>{{ $fecha->fecha6meses }}</strong> deberá pagar una penalización consistente en el 100% (cien por ciento) del precio establecido en la cláusula tercera, así como del 100% (cien por ciento) de la cantidad establecida como costo total por servicios adicionales establecidos en el adendum (en caso de que hubiesen sido contratados).
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA TERCERA.-</strong> El ARRENDATARIO se obliga a dejar un depósito de $5,000.00 (cinco mil pesos 00/100 m.n.) a más tardar el día <strong>{{ $fecha->fecha1diaantes }}</strong>, en calidad de garantía por los posibles daños causados a las instalaciones de CANTABRIA EVENTOS, ya sea por el mismo ARRENDATARIO, sus invitados y/o proveedores. En el supuesto de que no se genere ningún daño o el mismo sea inferior a la cantidad otorgada en concepto de depósito, el depósito o cantidad restante será devuelto a más tardar cinco días hábiles posteriores al evento, en el supuesto de que los daños superen la cantidad entregada como depósito, El ARRENDATARIO se compromete a pagar la cantidad restante a más tardar 7 (siete) días hábiles siguientes al evento, por lo cual desde ese momento el ARRENDATARIO se compromete a cubrir los daños y/o perjuicios ocasionados a la infraestructura, mobiliario, cristalería, mantelería y decoración interior y exterior e iluminación, cometido por sus invitados y/o proveedores. No se podrá dar inicio al evento en caso de que el ARRENDATARIO no deje el déposito mencionado. El depósito en garantía señalado en la presente cláusula no limita ni sustituye cualquier otra obligación o responsabilidad del ARRENDATARIO derivada del presente contrato, incluyendo penalizaciones, daños adicionales o incumplimientos contractuales.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA CUARTA.-</strong> El ARRENDATARIO asignará una persona para que tenga acceso 15 (quince) minutos antes del inicio del evento para que reciba las condiciones del inmueble. En caso de no asignar alguna persona, se dará por enterado de las buenas condiciones del inmueble. El acceso de los invitados será según la hora señalada en la clausula primera de este contrato.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA QUINTA.-</strong> Si por causas de fuerza mayor y/o por motivo de fenómenos meteorológicos y/o por causas ajenas a la voluntad de EL ARRENDADOR, ésta última se encuentra imposibilitada en cumplir con lo establecido en el presente contrato, EL ARRENDADOR se compromete a re agendar la fecha del evento de acuerdo a la disponibilidad de la agenda de CANTABRIA EVENTOS, o conseguir un espacio en diverso lugar para llevar a cabo el evento, lo cual será decisión exclusiva de EL ARRENDADOR, manifestando que en ningún caso procede el reembolso del importe pagado en favor del ARRENDATARIO.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA SEXTA.-</strong> La recepción de bebidas alcohólicas para el evento será el <strong>{{ $fecha->fecha1diaantes }}</strong>, únicamente en un horario de 9:00 a 15:00 horas. Las botellas deberán llevar el marbete de control fiscal y sanitario expedido por la autoridad correspondiente. La entrega de las bebidas alcohólicas sobrantes se realizará al siguiente día hábil en el mismo horario. El ARRENDATARIO se compromete a recogerlas máximo 5 (cinco) días hábiles después del evento, de lo contrario pierde su derecho a recoger dichas bebidas. Se permitirá el acceso e instalación de barriles de cerveza por parte del ARRENDATARIO. Sin perjuicio de lo anterior, el ARRENDATARIO reconoce y acepta que para el suministro y manejo del servicio de dichos barriles será obligatoria la contratación de un (1) mesero adicional, mismo que deberá ser proporcionado exclusivamente por el ARRENDATARIO, el costo adicional se cotizará al momento de su solicitud.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA SÉPTIMA.-</strong> Para la entrada de cualquier tipo de mobiliario, equipo, decoración, etc. contratada por el ARRENDATARIO a las instalaciones arrendadas, el proveedor deberá contactar a EL ARRENDADOR con mínimo 7 (siete) días hábiles para avisar de su llegada. El cual debe respetar un horario de 9:00 a 13:00 horas.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA OCTAVA.-</strong> EL ARRENDADOR no resguardará cualquier tipo de mobiliario, equipo, decoración, accesorios, etc. ni se hará responsable de alguna pérdida o daño.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>DÉCIMA NOVENA.-</strong> EL ARRENDADOR no brindará un espacio en las instalaciones arrendadas para que el proveedor realice un trabajo previo al evento.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA.-</strong> El ARRENDATARIO podrá hacer uso de las instalaciones arrendadas solo el día del evento, se podrán hacer pruebas de montaje de acuerdo a la disponibilidad de EL ARRENDADOR y bajo la responsabilidad del ARRENDATARIO. Al término de dicha prueba o montaje, las instalaciones regresaran a su montaje anterior y el ARRENDATARIO se hará responsable del cuidado y limpieza de las instalaciones, equipo y mobiliario del salón.
            </p>
        </div>
    
        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA PRIMERA.-</strong> El ARRENDATARIO podrá hacer uso de las instalaciones de acuerdo a la disponibilidad de EL ARRENDADOR y bajo la responsabilidad del ARRENDATARIO máximo de sesenta minutos para un solo ensayo días antes del evento agendando con quince dias naturales de anticipación.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA SEGUNDA.-</strong> El día del evento el ARRENDATARIO y sus invitados podrán ingresar a las instalaciones arrendadas a la hora establecida en la clausula primera de este contrato. Por ningun motivo se les dará acceso antes de la hora establecida.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA TERCERA.-</strong> EL ARRENDADOR utilizará como refresco la marca de la familia Coca-Cola en sabores Fresca, Coca-Cola Regular y Agua Mineral. Si el ARENDATARIO deseara otros sabores o bebidas diferentes, la tendrá que suministrar el mismo, sin que ello dé lugar a un descuento en el precio establecido.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA CUARTA.-</strong> EL ARRENDADOR por conducto de quien ella tenga a bien designar se reserva el derecho de admisión, prohibiendo la entrada a personas con vestimenta informal como pantalonera, gorra, short y/o playera de cualquier tipo. También se prohíbe la entrada a personas con indicios de intoxicación, armas de fuego, objetos punzocortantes, explosivos o todo aquello que EL ARRENDADOR considere peligroso para los invitados en el evento. El ARRENDATARIO acepta la restricción de acceso a personas (invitados y proveedores) que se presenten según los casos descritos en ésta claúsula.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA QUINTA.-</strong> EL ARRENDATARIO reconoce y acepta que existe una lista de proveedores no autorizados y sin acceso a las instalaciones por parte de EL ARRENDADOR, misma que le ha sido informada previamente y forma parte integral del presente contrato. EL ARRENDATARIO se obliga a proporcionar información veráz, completa y oportuna de todos los proveedores que participarán en el evento, incluyendo nombre comercial, razón social o nombre de la persona responsable. Queda estrictamente prohibído el ingreso de proveedores vetados bajo cualquier circunstancia, incluyendo cambio de nombre, representación por terceros, omisión de información o cualquier intento de ocultar su identidad. En caso de incumplimiento, EL ARRENDADOR podrá negar el acceso al proveedor sin responsabilidad alguna y aplicar una penalización equivalente al 20% del valor total del contrato.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA SEXTA.-</strong> EL ARRENDATARIO reconoce que es su responsabilidad verificar la identidad real de sus proveedores, por lo que cualquier información falsa, incompleta o incorrecta será considerada como dolo o mala fe, liberando a EL ARRENDADOR de cualquier responsabilidad.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA SÉPTIMA.-</strong> EL ARRENDATARIO se obliga a que, bajo ninguna circunstancia, se suministren bebidas alcohólicas a menores de edad ni a proveedores durante el evento, siendo responsable directo del control, supervisión y conducta de sus invitados y proveedores.
            </p>
            <p class="primeralinea">
                Queda estrictamente prohibido el consumo, posesión o distribución de sustancias ilícitas dentro de las instalaciones. En caso de detectarse a cualquier persona en estado de intoxicación por drogas, o a menores de edad consumiendo bebidas alcohólicas, EL ARRENDADOR, por conducto de su personal, podrá:
            </p>
            <p class="sangria">a) Retirar a dichas personas del evento;</p>
            <p class="sangria">b) Suspender el suministro de bebidas alcohólicas;</p>
            <p class="sangria">c) Dar aviso a las autoridades competentes; y</p>
            <p class="sangria">d) En casos graves, dar por terminado el evento o rescindir el contrato, sin responsabilidad alguna y sin obligación de reembolso.</p>
            <p class="primeralinea">
                EL ARRENDATARIO será responsable de cualquier consecuencia legal, administrativa o daño que derive del incumplimiento de lo dispuesto en la presente cláusula, obligándose a sacar en paz y a salvo a EL ARRENDADOR de cualquier reclamación, sanción o procedimiento derivado de dichos hechos.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA OCTAVA.-</strong> Será responsabilidad del ARRENDATARIO llevar un control del número de asistentes al evento, por lo que en el supuesto de que el número de invitados contratados se encuentre cubierto y aún estén pendiente de ingresar más asistentes, el ARRENDATARIO deslinda de toda responsabilidad a EL ARRENDADOR, sin que dé lugar a ampliar el número de asistentes, aclarando que niños a partir de los dos años o que ocupen un espacio cuenta como invitado.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>VIGÉSIMA NOVENA.-</strong> El ARRENDATARIO acepta y reconoce que no podrá ingresar a las instalaciones arrendadas arreglos florales, mesa de dulces, barras de postre, barras de bebidas, cámara 360º, barras de bebidas preparadas, así como cualquier tipo de alimento salvo autorización expresa y por escrito de EL ARRENDADOR.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>TRIGÉSIMA.-</strong> EL ARRENDATARIO reconoce que previo a la firma del presente contrato:
            </p>
            <p class="sangria">• Recibió información clara, completa y suficiente;</p>
            <p class="sangria">• Conoce el alcance de los servicios;</p>
            <p class="sangria">• Tuvo oportunidad de negociar términos;</p>
            <p class="sangria">• Comprende plenamente las obligaciones asumidas.</p>
            <p class="primeralinea">
                Por lo anterior, renuncia a alegar en el futuro error, dolo, mala fe, lesión o desconocimiento del contenido del contrato.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>TRIGÉSIMA PRIMERA.- SUPUESTOS DE RESCISIÓN AUTOMÁTICA.</strong>
            </p>
            <p class="primeralinea">
                Las partes acuerdan que el presente contrato podrá rescindirse de pleno derecho, de manera automática y sin necesidad de declaración judicial ni requerimiento previo, cuando se actualice cualquiera de los siguientes supuestos:
            </p>
            <p class="sangria">a) Incumplimiento en el pago, cuando EL ARRENDATARIO no cubra las cantidades pactadas en las fechas y términos establecidos en la cláusula cuarta, y dicho incumplimiento se prolongue por más de diez días naturales, en términos de la cláusula quinta;</p>
            <p class="sangria">b) Cancelación del evento por parte del ARRENDATARIO, en cuyo caso se estará a lo dispuesto en las cláusulas décima primera y décima segunda del presente contrato;</p>
            <p class="sangria">c) Imposibilidad de cumplimiento derivada de caso fortuito o fuerza mayor, en términos de la cláusula décima quinta;</p>
            <p class="sangria">d) Incumplimiento a las condiciones operativas del contrato, incluyendo aquellas relativas a proveedores, acceso, uso de instalaciones, control de asistentes y demás obligaciones establecidas en el presente instrumento, cuando dicho incumplimiento afecte o imposibilite la adecuada ejecución del evento;</p>
            <p class="sangria">e) Falta de cumplimiento de condiciones indispensables para la realización del evento, incluyendo el no otorgar el depósito en garantía en los términos de la cláusula décima tercera;</p>
            <p class="sangria">f) Cuando EL ARRENDATARIO, sus invitados o proveedores incurran en conductas que pongan en riesgo la seguridad de las personas, la integridad de las instalaciones o el desarrollo del evento;</p>
            <p class="sangria">g) Cuando se incumplan disposiciones legales, reglamentarias o administrativas aplicables, incluyendo aquellas relacionadas con consumo de alcohol, seguridad, protección civil o cualquier otra autoridad competente;</p>
            <p class="sangria">h) Cuando el número de asistentes exceda el límite contratado, y ello afecte la operación, capacidad o seguridad del inmueble;</p>
            <p class="sangria">i) Cuando EL ARRENDATARIO, sus invitados o proveedores se nieguen a acatar las indicaciones operativas del personal designado por EL ARRENDADOR;</p>
            <p class="sangria">j) Cuando se haga un uso distinto al pactado de las instalaciones o se realicen actividades no autorizadas dentro del inmueble.</p>
            <p class="primeralinea">
                Actualizado cualquiera de los supuestos anteriores, la rescisión surtirá efectos de manera inmediata, quedando EL ARRENDADOR liberado de cualquier obligación de prestación de servicios, sin responsabilidad alguna.
            </p>
            <p class="primeralinea">
                En tales casos, se aplicarán las consecuencias previstas en el presente contrato, incluyendo la pérdida de las cantidades pagadas, la exigibilidad de los saldos pendientes, intereses moratorios, penalidades y demás accesorios legales, sin que EL ARRENDATARIO pueda exigir devolución alguna ni oponer excepción en contrario, salvo aquellas que resulten de orden público.
            </p>
            <p class="primeralinea">
                Las partes reconocen que la presente cláusula ha sido pactada de manera libre, informada y sin vicio en el consentimiento, y que sus efectos son proporcionales a los daños y perjuicios que el incumplimiento genera, incluyendo la pérdida de oportunidad comercial, afectaciones operativas y costos asociados al evento.
            </p>
        </div>
        <div class="row clause-item">
            <p class="primeralinea">
                <strong>TRIGÉSIMA SEGUNDA.- FIRMA DEL CONTRATO.</strong> Las partes acuerdan que el presente contrato podrá ser firmado por EL ARRENDADOR a través de su apoderado legal, y por EL ARRENDATARIO, ya sea de forma autógrafa o mediante el uso de la firma electrónica avanzada (e.firma) emitida por el Servicio de Administración Tributaria (SAT), consistente en el conjunto de datos electrónicos vinculados al firmante, conformado por el certificado digital (.cer), la llave privada (.key) y su respectiva contraseña.
            </p>
            <p class="primeralinea">
                Ambas partes reconocen expresamente que cualquiera de dichas modalidades de firma, incluyendo la firma híbrida (autógrafa por una parte y electrónica por la otra), constituye manifestación inequívoca de su consentimiento, produciendo los mismos efectos jurídicos y plena validez legal, en términos de lo dispuesto por el Código de Comercio, la Ley de Firma Electrónica Avanzada y demás disposiciones aplicables. Asimismo, las partes acuerdan que el uso de la e.firma genera la presunción legal de que el documento fue firmado por su titular, siendo responsabilidad exclusiva de éste el resguardo de los medios de creación de dicha firma, por lo que no podrá desconocer su autoría ni alegar uso indebido.
            </p>
            <p class="primeralinea">
                De igual forma, reconocen que el presente contrato, en cualquiera de sus versiones, ya sea digital o impresa, conserva su integridad y contenido desde el momento de su firma, por lo que no podrá alegarse alteración, falsificación o falta de consentimiento respecto del mismo.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>TRIGÉSIMA TERCERA.-</strong> Para el entendimiento e interpretación del presente ambas partes se sujetan a lo establecido exclusivamente en el presente instrumento y en su caso en el adendum respectivo, por lo que cualquier convenio o disposición no establecida por escrito en el presente contrato no será válida.
            </p>
        </div>

        <div class="row clause-item">
            <p class="primeralinea">
                <strong>TRIGÉSIMA CUARTA.-</strong> Para todo lo relativo a la interpretación y cumplimiento del presente instrumento (incluyendo los formatos derivados del mismo), en este acto las partes se someten de manera expresa e irrevocable, a las leyes aplicables de esta Ciudad de Chihuahua y a la jurisdicción de los tribunales competentes de Chihuahua, Chih., y renuncian de manera expresa e irrevocable, a cualquier jurisdicción que pudiere corresponderles en virtud de sus domicilios presentes y futuros, la ubicación de sus bienes o por cualquier otra razón.
            </p>
        </div>

        <div class="flexbox-container">
            <div>
                <hr>
                ARRENDADOR<br>
                <strong>CANTABRIA EVENTOS Y SERVICIOS S.A. DE C.V.</strong><br>
                Representada por: Yuliana Elisa Anaya Estrada<br>
                Carácter: Apoderada Legal<br>
                (Firma autógrafa o electrónica)
            </div>
            <div class="arrendatario-box">
                <hr>
                ARRENDATARIO<br>
                <strong>{{ Str::upper($evento->cliente->nombre) }}</strong><br>
                (Firma autógrafa o electrónica)
            </div>
        </div>
        
        <div style="margin-top: 50px; font-size: 8px; text-align: center; color: #666;">
            Contrato de arrendamiento con número de folio {{ $evento->folioFormateado }}
        </div>
    </div>
</body>

</html>
