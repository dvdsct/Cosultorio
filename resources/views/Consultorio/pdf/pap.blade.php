<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF PAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <h2 style="font-family: 'Arial', sans-serif; font-size: 23px;"><strong>FICHA DE SOLICITUD DE LA CITOLOGIA EXFOLIATIVA (PAP)</strong></h2>
        </div>
        <h3 style="margin-top:20px"><strong> ANTECEDENTES </strong></h3>
        <div class="fila">
            <div class="col">
                @if($pap->fum != '' && $pap->fum != '1')
                <label><strong> FUM:</strong> {{$pap->fum}}</label>
                @else
                <label> <strong>Menopausia: </strong> Si.</label>
                @endif
                <br> <br>
                <label><strong> Metodo Anticonceptivo: </strong>
                    @if($pap->metodo_anti_con == '')
                    No.
                    @elseif($pap->metodo_anti_con == '2')
                    Hormonal.
                    @elseif($pap->metodo_anti_con == '3')
                    Barrera.
                    @elseif($pap->metodo_anti_con == '4')
                    DIU
                    @elseif($pap->metodo_anti_con == '5')
                    {{$pap->otros_anti_con}}
                    @endif
                </label>
            </div>

            <div class="col">
                <label><strong> Cirugias previas: </strong>
                    @if($pap->cirujias_pre == '')
                    No.
                    @elseif($pap->cirujias_pre == '2')
                    Histerectomia.
                    @elseif($pap->cirujias_pre == '3')
                    LEEP.
                    @elseif($pap->cirujias_pre == '4')
                    Cono.
                </label>
                <br> <br>
                <label><strong> Causa o Lesión: </strong>
                    {{$pap->causa_lesion}}</label>
                @endif
            </div>
        </div>

        <div class="fila">
            <div class="col">
                <label><strong> Embarazo Actual: </strong>
                    @if($pap->embarazo_actual == '' || $pap->embarazo_actual =='0' )
                    No.
                    @elseif($pap->embarazo_actual == '1')
                    Si.
                    @endif
                </label>
            </div>

            <div class="col">
                <label> <strong>Terapia Hormonal de Reemplazo(THR): </strong>
                    @if($pap->thr == '' || $pap->thr == '0')
                    No.
                    @elseif($pap->thr == '1')
                    Si.
                    @endif
                </label>
            </div>
            <br><br>
            <div class="col">
                <label><strong> Tratamiento Radiante: </strong>
                    @if($pap->trata_rad == '' || $pap->trata_rad == '0')
                    No.
                    @elseif($pap->trata_rad == '1')
                    Si.
                    @endif
                </label>
            </div>

            <div class="col">
                <label><strong> Quimioterapia: </strong>
                    @if($pap->quimio == '' || $pap->quimio == '0')
                    No.
                    @elseif($pap->quimio== '1')
                    Si.
                    @endif
                </label>
            </div>
        </div>

        <div class="fila">
            <div class="col">
                <label> <strong>Tipo de muestra:</strong>
                    @if($pap->tipo_muestra == '' || $pap->tipo_muestra == '1')
                    -
                    @elseif($pap->tipo_muestra == '2')
                    Exocervical(C)
                    @elseif($pap->tipo_muestra == '3')
                    Endocervical(E)
                    @elseif($pap->tipo_muestra == '4')
                    Exo y Endo Cervical(CE)
                    @elseif($pap->tipo_muestra == '5')
                    Cúpula Vaginal
                    @endif
                </label>
            </div>

            <div class="col">
                <label> <strong>Método Toma Muestra:</strong>
                    @if($pap->met_toma_mue == '' || $pap->met_toma_mue == '1' )
                    -
                    @elseif($pap->met_toma_mue == '2')
                    Espátula.
                    @elseif($pap->met_toma_mue == '3')
                    Cepillo.
                    @elseif($pap->met_toma_mue == '4')
                    Espátula y Cepillo.
                    @elseif($pap->met_toma_mue == '5')
                    Hisopo Liquido.
                    @elseif($pap->met_toma_mue == '6')
                    Sin Datos.
                    @endif
                </label>
            </div>
        </div>

        <div class="fila">
            <h3 style="margin-top:20px"><strong> TAMIZAJE ANTERIOR </strong></h3>
            <div class="col_3">
                <label> <strong>Test de VPH:</strong>
                    @if($pap->res_vph == '0')
                    -
                    @elseif($pap->res_vph == '0')
                    Negativo
                    @elseif($pap->res_vph == '1')
                    Positivo
                </label>

                <label><strong>Fecha Tamizaje:</strong>
                    {{$pap->fecha_tami}}
                    @endif
                </label>
            </div>

            <div class="col_3">
                <label> <strong>Pap Previo:</strong>
                    @if($pap->pap_previo->id != '')
                    {{$pap->pap_previo->created_at}}
                    @else

                    @endif
                </label>
            </div>

            <div class="col_3">
                <label> <strong>Resultado PAP previo:</strong>
                    @if($pap->pap_previo->descripcion == '1')
                    No sabe.
                    @elseif($pap->pap_previo->descripcion == '2')
                    Insatisfactorio.
                    @elseif($pap->pap_previo->descripcion == '3')
                    Negativo/Normal/Inflamatorio.
                    @elseif($pap->pap_previo->descripcion == '4')
                    ASC/Atipia/Malignidad
                    @endif
                </label>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>