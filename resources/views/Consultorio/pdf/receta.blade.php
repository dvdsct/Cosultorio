<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meow+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        .meow-script-regular {
            font-family: "Meow Script", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 60px;
            text-align: center;
            margin: 0;
        }

        .medico {
            height: 60px;
        }

        .mp {
            font-size: 14px;
            text-align: center;
        }

        .especialidad {
            text-align: center;
            font-weight: bolder;
        }

        .servicios {
            text-align: center;
            font-style: italic;
            font-size: 20px;
        }

        p {
            margin: 0;
        }

        hr {
            border: none;
            /* Quita el borde predeterminado */
            border-top: 4px solid black;
            /* Establece un borde superior de 2 píxeles de grosor y color negro */
            max-width: 100%;
        }

        .sanatorio {
            font-weight: bold;
            text-decoration: underline;
            font-size: 12px;
        }

        .direccion {
            font-weight: bold;
            font-size: 12px;
        }

        .foot {
            display: flex;
            
            /* Utiliza flexbox */
            align-items: center;
            /* Alinea los elementos verticalmente */
        }
    </style>


    <div class="row">
        <div class="col-md-6">
            <div class="container">
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
                </div>

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
                    <hr>
                    <div class="row foot">
                        <div>
                            <p class="sanatorio">NUEVO SANATORIO ALVEAR:</p>
                        </div>
                       
                        <P class="direccion">Moreno (S) 266 - (0385) 4214727 / 1552 - Santiago del Estero</P>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="container">
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
                </div>

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


</body>

</html>