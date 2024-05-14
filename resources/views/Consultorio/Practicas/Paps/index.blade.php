@extends('adminlte::page')

@section('title', 'Lista de Paps')

@section('content_header')

@stop

@section('content')

<div class="row px-3">
    <div class="card-header col-md-6 pt-4 border-0 px-1" style="display:flex;">
        <div class="card-tools" style="width: 80%;">
            <div class="input-group input-group-sm">
                <input type="text" wire:model.live="query" class="form-control float-right" placeholder="Buscar paciente">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="display: flex; justify-content:flex-end; align-items:flex-end">
        <h2 style="margin: 0;"> <strong> PAPS </strong></h2>
    </div>
</div>



<div class="table-responsive">
    <div class="col-12">
        <div class="card">
            <table class="table table-hover">
                <thead>
                    <th>Fecha de Estudio</th>
                    <th>Paciente</th>
                    <th>FUM</th>
                    <th>Menopausia</th>
                    <th>Anticonceptivo</th>
                    <th>Cirujias Previas</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($paps as $c)
                    <tr>
                        <td> {{ \Carbon\Carbon::parse($c->updated_at)->locale('es_AR')->timezone('America/Argentina/Buenos_Aires')->isoFormat('D [de] MMMM [de] YYYY') }}</td>
                        <td>{{ $c->pacientes->perfiles->personas->apellido . ' ' . $c->pacientes->perfiles->personas->nombre }}</td>
                        <td>
                            @if ($c->fum == '')
                            -
                            @else
                            {{ $c->fum }}
                            @endif
                        </td>
                        <td>
                            @if ( $c->menopausia == 1)
                            Si
                            @elseif ($c->menopausia == '')
                            No
                            @else
                            {{ $c->menopausia}}
                            @endif
                        </td>
                        <td>
                            @if ($c->metodo_anti_con == 1)
                            Ninguno
                            @elseif ($c->metodo_anti_con == 2)
                            Hormonal
                            @elseif ($c->metodo_anti_con == 3)
                            Barrera
                            @elseif ($c->metodo_anti_con == 4)
                            DIU
                            @elseif ($c->metodo_anti_con == 5)
                            {{$c->otros_anti_con}}
                            @else
                            {{ $c->metodo_anti_con }}
                            @endif
                        </td>
                        <td>
                            @if ($c->cirujias_pre ==1)
                            Ninguna
                            @elseif ($c->cirujias_pre ==2)
                            Histerectomía
                            @elseif ($c->cirujias_pre ==3)
                            LEEP
                            @elseif ($c->cirujias_pre ==4)
                            Cono
                            @else
                            {{ $c->cirujias_pre}}
                            @endif
                        </td>
                        <td style="width:80px"> <button type="button" class="btn btn-block btn-info btn-sm" style="width:80px">Ver</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@stop
