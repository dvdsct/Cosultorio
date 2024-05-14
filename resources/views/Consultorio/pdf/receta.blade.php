<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>


</head>

<body style="padding: 0; margin: 0;">

    @foreach ($items as $par)
    <table style="margin:0;border:1px solid black;width:19cm;max-height:10cm;">
        <thead>
            <!-- CABECERA TABLA IZQUIERDA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h2 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h2>
                    <span style="padding-top: 0; font-style: italic;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic;">M.P. N° {{ $matricula }}</span>
                    <p style="padding-top: 0;">Papanicolau - Colposcopia - Partos - Cesarea</p>
                </div>
                <hr>
            </th>
            <!-- CABECERA TABLA DERECHA  -->
            <th style="width: 50%; position: relative; height: auto;">
                <div style="text-align: center; padding: 1px; top: 10px; left: 0; right: 0;">
                    <h2 style="padding-top: 5px; margin-top: 0; margin-bottom: 0; font-style: italic; font-family: 'Arial', sans-serif;">{{ $titulo . ' ' .$medico }}</h2>
                    <span style="padding-top: 0; font-style: italic;">{{ $especialidad }}</span>
                    <span style="padding-top: 0; font-style: italic;">M.P. N° {{ $matricula }}</span>
                    <p style="padding-top: 0;">Papanicolau - Colposcopia - Partos - Cesarea</p>
                </div>
                <hr>
            </th>
        </thead>

        <tbody>
            <tr>
                <!-- PACIENTE TABLA DE LA IZQUIERDA -->
                <td style="margin-top: 40px;">
                    <ul>
                        <h3 style="margin: 0;">Paciente</h3>
                        <li>{{ $paciente }} </li>
                        <li>{{'OS: '.  $osd->first()->descripcion .' N° Afil:'.  $osd->first()->nro_afil}} </li>
                        <li>Plan:{{$osd->first()->plan}}</li>
                        <li>Diagnostico: {{ $par->first()->ciediez->descripcion }}</li>
                    </ul>
                </td>

                <!-- INDICACIONES TABLA DE LA IZQUIERDA -->
                <td>
                    <ul>
                        <h3 style="margin: 0;">Indicaciones</h3>
                        @foreach ($par as $rem)
                        <li>{{ $rem->vademecums->droga . ' ' . $rem->vademecums->cantidad }}
                            <br>{{ $rem->cantidad . ' cada ' . $rem->indicacion }} horas.</li>
                            @endforeach
                        </ul>
                </td>
            </tr>

            <tr>
                <td>
                    <ul>
                        <h3 style="margin: 0;">Medicamentos</h3>
                        @foreach ($par as $rem)
                        <li>{{ $rem->vademecums->droga . ' ' . $rem->vademecums->cantidad . ' ' . $rem->vademecums->presentacion }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="position: relative; height: auto;">
                <hr>
                    <div style="text-align: center; margin-top:0; padding-top: 0;">
                        <h3 class="sanatorio" style="margin: 0;">NUEVO SANATORIO ALVEAR</h3>
                        <p class="direccion" style="margin: 0;">Moreno (S) 266 - (0385) 4214727 / 1552</p>
                        <p style="margin: 0;">Santiago del Estero</p>
                    </div>
                </td>


                <td style="position: relative; height: auto;">
                <hr>
                <div style="text-align: center; margin-top:0; padding-top: 0;">
                        <h3 class="sanatorio" style="margin: 0;">NUEVO SANATORIO ALVEAR</h3>
                        <p class="direccion" style="margin: 0;">Moreno (S) 266 - (0385) 4214727 / 1552</p>
                        <p style="margin: 0;">Santiago del Estero</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>