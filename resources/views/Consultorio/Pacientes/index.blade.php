@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')

@stop

@section('content')


<div class="card-header col-md-6 border-bottom-0" style="height: 40px;">
    <div class="card-tools" style="width: 100%;">
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

<table class="table table-hover ml-4">
    <thead>
        <th>Paciente</th>
        <th>DNI</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Obra Social</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($pacientes as $p )

        <tr>
            <td>{{ $p->personas->apellido . ' ' . $p->personas->nombre }}</td>
            <td>{{ $p->personas->dni  }}</td>
            <td>{{ $p->personas->edad }}</td>
            <td>{{ optional($p->personas->telefonos)->first()->numero ?? '-' }}</td>
            <td>{{ $p->personas->correos->first()->direccion ?? '-' }}</td>
            <td></td>

            <td style="width: 400px;">
                <div class="row" style="width: 380px; display:flex; justify-content:center">
                    <button type="button" class="btn btn-block btn-success btn-sm" style="width:80px">Consultas</button>
                    <button type="button" class="btn btn-block btn-danger btn-sm ml-2" style="width:80px">Paps</button>
                    <button type="button" class="btn btn-block btn-warning btn-sm ml-2" style="width:80px">Colp.</button>
                    <button type="button" class="btn btn-block btn-info btn-sm ml-2" style="width:80px">Ver</button>
                </div>
            </td>

        </tr>

        @endforeach
    </tbody>
</table>








@stop

@section('css')
@stop

@section('js')
@stop