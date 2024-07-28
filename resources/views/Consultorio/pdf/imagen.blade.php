<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de imagen - {{ $paciente }}</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 95%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
        }

        table {
            margin: 0;
            border-right: 1px solid black;
            width: 40%; /* Ajuste para ocupar el 40% de la hoja A4 */
            height: 100%; /* Ajuste para ocupar la altura completa */
            padding: 0;
            box-sizing: border-box;
            table-layout: fixed;
        }

        th, td {
            padding: 10px;
        }

        .header {
            text-align: center;
            padding: 1px;
        }

        thead, tfoot {
            display: table-row-group;
        }

        tbody {
            display: table-row-group;
            height: 100%;
        }

        .header h3 {
            padding-top: 2px;
            margin-top: 0;
            margin-bottom: 0;
            font-style: italic;
            font-family: 'Arial', sans-serif;
        }

        .header span {
            padding-top: 0;
            font-style: italic;
            font-size: 10px;
        }

        .footer {
            text-align: center;
            padding-top: 0;
        }

        .footer h5 {
            margin: 0;
        }

        .footer p {
            margin: 0;
            font-size: 10px;
        }

        ul {
            padding: 0;
            list-style-type: none;
        }

        ul h4 {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        ul li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    
    <table>
        <thead>
            <!-- CABECERA MEDICO  -->
            <tr>
                <th>
                    <div class="header">
                        <h3>{{ $titulo . ' ' .$medico }}</h3>
                        <span>{{ $especialidad }}</span>
                        <span>M.P. N° {{ $matricula }}</span><br>
                        <span>Papanicolau - Colposcopia - Partos - Cesarea</span>
                    </div>
                    <hr>
                </th>
            </tr>
        </thead>
       
        <tbody>
            <tr>
                <!-- PACIENTE TABLA  -->
                <td>
                    <ul style="margin-left: 1cm;">
                        <h4 style="font-style: italic;">Paciente</h4>
                        <li style="font-family: 'Arial', sans-serif;">- {{ $paciente }} 
                        @if($edad == 0)
                        
                        @else
                        - {{$edad}} años</li>
                        @endif

                        @if($osd->first()->descripcion == 'Ninguna')
                        <li></li>
                        @else
                        <li style="font-family: 'Arial', sans-serif;">- {{'OS: '.  $osd->first()->descripcion .' N° Afil:'.  $osd->first()->nro_afil}} Plan:{{$osd->first()->plan}}</li>
                        @endif
                    </ul>
                    <ul style="margin-left: 1cm;">
                        @foreach ($items as $item)
                        <li style="font-family: 'Arial', sans-serif;"> {{$item->first()->tipoImagenes->tipo_img}} </li>
                        @endforeach
                        <br>
                        <li style="list-style-type: none; font-family: 'Arial', sans-serif;"> <h4 style="margin: 0; font-style: italic; display: inline-block; margin-bottom: 2px;"> Dx: </h4> 
                        {{ $item->first()->ciediez->descripcion }}</li>
                    </ul>
                </td>
            </tr>
        </tbody>
       
        <tfoot>
            <!-- PIE DE PAGINA -->
            <tr>
                <td>
                    <hr>
                    <div class="footer">
                        <h5>NUEVO SANATORIO ALVEAR</h5>
                        <p>Moreno (S) 266 - (0385) 4214727 / 1552</p>
                        <p>Santiago del Estero</p>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
   
</body>
</html>
