<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Colposcopia</title>
</head>

<body>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .contenedor {
            padding: 0;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .tabla {
            white-space: nowrap;
            padding-top: 50px;
        }

        .col {
            width: 49%;
            margin: 0;
            display: inline-block;
            vertical-align: top;
        }

        .col_3 {
            width: 31%;
            margin: 0;
            display: inline-block;
            vertical-align: top;
        }

        .fila {
            padding-top: 20px;
        }
    </style>

    <div class="contenedor">
        <div class="cabecera">
            <h2 style="font-family: 'Arial', sans-serif; font-size: 23px;"><strong>FICHA PARA EL REGISTRO DE COLPOSCOPIA</strong></h2>
        </div>
        <ul>
            <h3 style="margin-top:20px"> Responsable del Examen Colposcópico </h3>
        </ul>
        <div class="fila">
            <div class="col">
                <label><strong> Nombre y Apellido:</strong>
                    @if($colpo->responsable == '')
                    -
                    @else
                    {{$colpo->responsable}}
                    @endif
                </label>
            </div>

            <div class="col">
                <label><strong> Establecimiento:</strong>
                    @if($colpo->establecimiento == '')
                    -
                    @else
                    {{$colpo->establecimiento}}
                    @endif
                </label>
            </div>
        </div>

        <div class="fila">
            <label><strong>Localidad del Establecimiento:</strong>
                @if($colpo->localidad == '')
                -
                @else
                {{$colpo->localidad}}
                @endif
            </label>
        </div>

        <ul>
            <h3 style="margin-top:20px"> Informacion Complementaria </h3>
        </ul>
        <div class="fila">
            <div class="col">
                <label> <strong>Resultado Test VPH:</strong>
                    @if($colpo->test_vph == 0)
                    Negativo.
                    @elseif($colpo->test_vph == 1)
                    Positivo.
                    @endif
                </label>
            </div>

            <div class="col">
                <label><strong>ASC-US:</strong>
                    @if(empty($colpo->citologias->asc_us))
                    No.
                    @elseif($colpo->citologias->asc_us == '1')
                    Si.
                    @endif
                </label>
                <label><strong>L SIL:</strong>
                    @if(empty($colpo->citologias->l_sil))
                    No.
                    @elseif($colpo->citologias->l_sil == 1)
                    Si.
                    @endif
                </label>
                <label><strong>ASCH:</strong>
                    @if(empty($colpo->citologias->asch))
                    No.
                    @elseif($colpo->citologias->asch == 1)
                    Si.
                    @endif
                </label> <br>
                <label><strong>HSIL:</strong>
                    @if(empty($colpo->citologias->hsil))
                    No.
                    @elseif($colpo->citologias->hsil == 1)
                    Si.
                    @endif
                </label>
                <label><strong>CA:</strong>
                    @if(empty($colpo->citologias->ca))
                    No.
                    @elseif($colpo->citologias->ca == 1)
                    Si.
                    @endif
                </label>
                <label><strong>OTROS:</strong>
                    @if(empty($colpo->citologias->otros))
                    No.
                    @elseif($colpo->citologias->otros == 1)
                    Si.
                    @endif
                </label>
            </div>
        </div>

        <div class="fila">
            <label><strong>Observaciones:</strong>
                @if($colpo->observaciones == '')
                -
                @else
                {{$colpo->observaciones}}
                @endif
            </label>
        </div>

        <ul>
            <h3 style="margin-top:20px">Colposcopia</h3>
        </ul>
        <div class="fila">
            <div class="col">
                <label><strong>Evaluacion General:</strong>
                    @if($colpo->evaluacion == 0)
                    Inadecuada.
                    @elseif($colpo->evaluacion == 1)
                    Adecuada.
                    @endif
                </label>
            </div>

            <div class="col">
                <label> <strong>Zona de Transformacion:</strong>
                    @if($colpo->zona_trans == 0 || $colpo->zona_trans == '')
                    -
                    @else
                    {{$colpo->zona_trans}}
                    @endif
                </label>
            </div>
        </div>

        <ul>
            <h3>Hallazgos Colposcópicos IFCPC 2011</h3>
        </ul>
        <div class="fila">
            <label> <strong>Hallazgos Normales:</strong>
                @if(empty($colpo->normales))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>Anormales Grado 1 (menor):</strong>
                @if(empty($colpo->anormales_g1))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>Grado 2 (mayor):</strong>
                @if(empty($colpo->anormales_g2))
                -
                @else
                Si.
                @endif
            </label>
        </div>

        <div class="fila">
            <label> <strong>No especifico:</strong>
                @if(empty($colpo->no_especifico))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>Sospecha de invasión:</strong>
                @if(empty($colpo->sospecha_inv))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>Hallazgos Varios:</strong>
                @if(empty($colpo->varios))
                -
                @else
                Si.
                @endif
            </label>
        </div>

        <div class="fila">
            <label> <strong>Biopsia:</strong>
                @if(empty($colpo->biopsia))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>ECC (Evaluacion Conducto Cervical):</strong>
                @if(empty($colpo->ecc))
                -
                @else
                Si.
                @endif
            </label>
            <label> <strong>Test de Schiller:</strong>
                @if(empty($colpo->test_schiller))
                Negativo.
                @else
                Positivo.
                @endif
            </label>
        </div>

        <ul>
            <h3>Resultados de la Biopsia</h3>
        </ul>
        <div class="fila">
            <label> <strong>Negativo:</strong></label>
            <label> <strong> CIN I:</strong></label>
            <label> <strong> CIN II:</strong></label>
            <label> <strong> CIN III:</strong></label>
            <label> <strong> CIS:</strong></label>
        </div>
        <div class="fila">
            <label> <strong>Ca Invasor:</strong></label>
            <label> <strong>Adenocis:</strong></label>
            <label> <strong>Adeno Ca Invasor:</strong></label>
            <label> <strong>Otros:</strong></label>
        </div>

        <ul>
            <h3>Tratamiento</h3>
        </ul>
        <div class="fila">
            <label> <strong>Escisión:</strong>
            </label>
        </div>

        <div class="fila">
            <label> <strong>Seguimiento: </strong>
                @if($colpo->seguimiento == '')
                -
                @else
                {{$colpo->seguimiento}}
                @endif
            </label>
        </div>
</body>

</html>