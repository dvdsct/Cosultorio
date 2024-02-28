@extends('adminlte::page')

@section('title', 'Listado de Consultas')

@section('content_header')

@stop

@section('content')

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


<div class="table-responsive">
    <div class="col-12">
        <div class="card">
            <table class="table table-hover">
                <thead>
                    <th>Fecha de Consulta</th>
                    <th>Paciente</th>
                    <th>Diagnostico</th>
                    <th>Observaciones</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($consultas as $c)
                    <tr>
                        <td>
                            {{ \Carbon\Carbon::parse($c->updated_at)->locale('es_AR')->timezone('America/Argentina/Buenos_Aires')->isoFormat('D [de] MMMM [de] YYYY') }}
                        </td>
                        <td>{{ $c->perfiles->personas->apellido . ' ' . $c->perfiles->personas->nombre }}</td>
                        <td>{{ $c->ea }}</td>
                        <td>{{ $c->observaciones }}</td>
                        <td> <button type="button" class="btn btn-block btn-info btn-sm ml-2" style="width:80px">Ver</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@stop