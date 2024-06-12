<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>


</head>

<body style="padding: 0; margin: 0;">

    @foreach ($items as $par)
    <table style="margin:0;border:1px solid black;width:19cm; height:12cm; padding: 0;">
        <thead>
            <!-- CABECERA TABLA IZQUIERDA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h3 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h3>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">M.P. N° {{ $matricula }}</span>
                    <p style="padding-top: 0; font-size: 10px;">Papanicolau - Colposcopia - Partos - Cesarea</p>
                </div>
                <hr>
            </th>
            <!-- CABECERA TABLA DERECHA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h3 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h3>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic; font-size: 10px;">M.P. N° {{ $matricula }}</span>
                    <p style="padding-top: 0; font-size: 10px;">Papanicolau - Colposcopia - Partos - Cesarea</p>
                </div>
                <hr>
            </th>
        </thead>

        <tbody>
            <tr>
                <!-- PACIENTE TABLA DE LA IZQUIERDA -->
                <td style="background: green;">
                    <ul>
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif;">Paciente</h4>
                        <li>{{ $paciente }} - 19 años </li>
                        <li>{{'OS: '.  $osd->first()->descripcion .' N° Afil:'.  $osd->first()->nro_afil}} Plan:{{$osd->first()->plan}}</li>
                    </ul>
                </td>

                <!-- INDICACIONES TABLA DE LA DERECHA -->
                <td>
                    <ul>
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif;">Indicaciones</h4>
                        @foreach ($par as $rem)
                        <li>{{ $rem->vademecums->droga}}
                            <br>{{ $rem->cantidad . ' cada ' . $rem->indicacion }} horas.</li>
                            @endforeach
                        </ul>
                </td>
            </tr>

            <tr>
                <td>
                    <ul>
                        <h4 style="margin: 0; font-family: 'Arial', sans-serif;">Medicamentos</h4>
                        @foreach ($par as $rem)
                        <li>{{ $rem->vademecums->droga . ' ' . $rem->vademecums->presentacion }}</li>
                        @endforeach
                        <li>Dx: {{ $par->first()->ciediez->descripcion }}</li>
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
                <td style="position: relative;">
                <div style="text-align: center;  margin-top:0; padding-top: 10px; height: 3px;">
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