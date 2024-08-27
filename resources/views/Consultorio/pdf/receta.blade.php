<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta - {{ $paciente }}</title>


</head>

<body style="padding: 0; margin: 0;">

    @foreach ($items as $par)
    <table style="margin:0;border:1px solid black;width:19cm; height:12cm; padding: 0;">
        <thead>
            <!-- CABECERA TABLA IZQUIERDA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h3 style="padding-top: 2px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h3>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">M.P. N° {{ $matricula }}</span> <br>
                    <span style="padding-top: 0; font-size: 10px;">Papanicolau - Colposcopia - Partos - Cesarea</span>
                </div>
                <hr>
            </th>
            <!-- CABECERA TABLA DERECHA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h3 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h3>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">M.P. N° {{ $matricula }}</span> <br>
                    <span style="padding-top: 0; font-size: 10px;">Papanicolau - Colposcopia - Partos - Cesarea</span>
                </div>
                <hr>
            </th>
        </thead>

        <tbody>
            <tr>
                <!-- PACIENTE TABLA DE LA IZQUIERDA -->
                <td>
                    <ul>
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif;">Paciente</h4>
                        <li style="font-family: 'Arial', sans-serif; list-style-type: none;">- {{ $paciente }} 
                        @if($edad == 0)
                        
                        @else
                        - {{$edad}} años</li>
                        @endif

                        @if($osd->first()->descripcion == 'Ninguna')
                        <li></li>
                        @else
                        <li style="font-family: 'Arial', sans-serif; list-style-type: none;">- {{'OS: '.  $osd->first()->descripcion .' N° Afiliado: '.  $osd->first()->nro_afil}} Plan: {{$osd->first()->plan}}</li>
                        @endif
                    </ul>
                </td>

                <!-- INDICACIONES TABLA DE LA DERECHA -->
                <td>
                    <ul>
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif;">Indicaciones</h4>
                        @foreach ($par as $rem)
                        <li style="list-style-type: none; font-family: 'Arial', sans-serif;">{{ $rem->vademecums->droga}}
                            <br>{{ $rem->cantidad . ' ' . $rem->indicacion }}.</li> <br>
                            @endforeach
                        </ul>
                </td>
            </tr>

            <tr>
                <td>
                    <ul>
                        @foreach ($par as $rem)
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif; font-style: italic;">R/p</h4>
                        <li style="list-style-type: none; font-family: 'Arial', sans-serif;">- {{ $rem->vademecums->droga . ' ' . $rem->vademecums->presentacion }}</li>
                        <li style="list-style-type: none; font-family: 'Arial', sans-serif;"> <h4 style="margin: 0; font-family: 'Arial', sans-serif; font-style: italic; display: inline-block; margin-bottom: 2px;"> Dx: </h4> 
                        {{ $rem->ciediez->codigo }}</li>
                        @endforeach
                    </ul>
                </td>
                <td></td>
            </tr>
            <tfoot>
                <!-- PIE DE PAGINA DE TABLA DE LA IZQUIERDA -->
                <td><hr>
                    <div style="text-align: center; padding-top: 0;">
                        <h5 class="sanatorio" style="margin: 0;">NUEVO SANATORIO ALVEAR</h5>
                        <p class="direccion" style="margin: 0; font-size: 10px;">Moreno (S) 266 - (0385) 4214727 / 1552</p>
                        <p style="margin: 0; font-size: 10px;">Santiago del Estero</p>
                    </div>
                </td>

                <!-- PIE DE PAGINA DE TABLA DE LA DERECHA -->
                <td>
                <div style="text-align: center; padding-top: 0;">
                        <h5 class="sanatorio" style="margin: 0;">NUEVO SANATORIO ALVEAR</h5>
                        <p class="direccion" style="margin: 0; font-size: 10px;">Moreno (S) 266 - (0385) 4214727 / 1552</p>
                        <p style="margin: 0; font-size: 10px; padding-bottom: 0;">Santiago del Estero</p>
                    </div>
                </td>
            </tfoot>
        </tbody>
    </table>
    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>