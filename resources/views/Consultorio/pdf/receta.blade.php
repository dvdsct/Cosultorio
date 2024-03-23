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
                <div class="medico">
                    <h1 class='meow-script-regular'> Dr. Caceres Walter Ariel </h1>
                </div>

                <div class="mp">
                    <p> M.P. N° 2047 </p>
                </div>

                <div class="especialidad">
                    <p> GINECOLOGÍA Y OBSTETRICIA </p>
                </div>

                <div class="servicios">
                    <p> Papanicolau - Colposcopia - Partos - Cesarea </p>
                </div>

                <hr>

                <div class="cuerpo" style="height: 75vh;">
                    <table>
                        <thead>
                            <th>Medicamento</th>
                            <th>Cantidad</th>
                            <th> Cada</th>

                        </thead>
                        <tbody>
                            @foreach ($items as $rem)
                                <tr>
                                    <td> {{ $rem->vademecums->droga . ' ' . $rem->vademecums->cantidad }}</td>
                                    <td> {{ $rem->indicacion }} </td>
                                    <td> {{ $rem->cantidad }} </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="firma_sello">

                </div>

                <div class="pie_info">
                    <hr>
                    <div>
                        <p class="sanatorio">NUEVO SANATORIO ALVEAR:</p>
                    </div>

                    <P class="direccion">Moreno (S) 266 - (0385) 4214727 / 1552 - Santiago del Estero</P>

                </div>
            </div>
        </div>

        <div class="col-3">

                <div class="membrete">
                    <div class="medico">
                        <h1 class='meow-script-regular'> Dr. Caceres Walter Ariel </h1>
                    </div>

                    <div class="mp">
                        <p> M.P. N° 2047 </p>
                    </div>

                    <div class="especialidad">
                        <p> GINECOLOGÍA Y OBSTETRICIA </p>
                    </div>

                    <div class="servicios">
                        <p> Papanicolau - Colposcopia - Partos - Cesarea </p>
                    </div>

                    <hr>

                <div class="cuerpo" style="height: 75vh;">
                    <table>
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="firma_sello">

                </div>

                <div class="pie_info">
                    <img src="pie_pagina.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
