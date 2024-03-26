<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Meow+Script&display=swap" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="row bg-success">
        <div class="col-5">
            <div class="membrete">


                <hr>

                <table style="border:1px solid black;">
                    <thead>
                        <th>

                            <div style="color:white;text-align: center; padding:10px; background:rgb(128, 218, 236)">
                                <h1 style="padding-top:0px;"> Dr. Caceres Walter Ariel </h1>

                                <p style="padding-top:0px;"> M.P. N° 2047 </p>

                                <p style="padding-top:0px;"> GINECOLOGÍA Y OBSTETRICIA </p>

                                <p style="padding-top:0px;"> Papanicolau - Colposcopia - Partos - Cesarea </p>
                            </div>
                        </th>
                        <th>

                            <div style="color:white;text-align: center; padding:10px; background:rgb(128, 218, 236)">
                                <h1> Dr. Caceres Walter Ariel </h1>

                                <p> M.P. N° 2047 </p>

                                <p> GINECOLOGÍA Y OBSTETRICIA </p>

                                <p> Papanicolau - Colposcopia - Partos - Cesarea </p>
                            </div>
                        </th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ul>
                                    <h3>Datos Personales</h3>

                                    <li>Nombre</li>
                                    <li>Apellido</li>
                                    <li>Obra Social</li>
                                    <li>Plan</li>
                                    <li>Nro Afiliado</li>
                                    <li>Diagnostico: {{ $items->first()->ciediez->descripcion }}</li>
                                </ul>
                            </td>
                            <td>
                                <h3>Indicaciones</h3>
                                @foreach ($items as $rem)
                                <ul>
                                    <li>{{ $rem->vademecums->droga . ' ' . $rem->vademecums->cantidad  }}
                                        <br>{{   $rem->cantidad .' cada '. $rem->indicacion }}</li>

                                </ul>
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <br>
                        </tr>

                        <tr>
                            <td>
                                <h3>Medicamentos</h3>

                                @foreach ($items as $rem)
                                    <ul>
                                        <li>{{ $rem->vademecums->droga . ' ' . $rem->vademecums->cantidad . ' ' . $rem->vademecums->presentacion }}
                                          </li>

                                    </ul>
                                @endforeach
                            </td>
                            <td>

                            </td>
                        </tr>
                        <hr>
                        <tr>

                        <td>
                            <div style="color:white;text-align: center; padding:10px; background:rgb(128, 218, 236)">
                                <p class="sanatorio">NUEVO SANATORIO ALVEAR:</p>

                                <P class="direccion">Moreno (S) 266 - (0385) 4214727 / 1552 - Santiago del Estero</P>
                                <h5 class='meow-script-regular'> Dr. Caceres Walter Ariel </h5>


                            </div>
                        <td>
                            <div style="color:white;text-align: center; padding:10px; background:rgb(128, 218, 236)">
                                <p class="sanatorio">NUEVO SANATORIO ALVEAR:</p>

                                <P class="direccion">Moreno (S) 266 - (0385) 4214727 / 1552 - Santiago del Estero</P>
                                <h5 class='meow-script-regular'> Dr. Caceres Walter Ariel </h5>


                            </div>

                        </td>


                        </tr>


                    </tbody>
                </table>
            </div>

            <div class="firma_sello">

            </div>

            <div class="pie_info">
                <hr>

            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
